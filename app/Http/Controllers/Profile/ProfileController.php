<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showForm()
    {
        return view('profile.intro');
    }

    public function generateIntro(Request $request)
    {
        $type = $request->input('type');
        $content = $request->input('content');
        $name = $request->input('name');
        $job = $request->input('job');
        $experience = $request->input('experience');
        $strengths = $request->input('strengths');

        if ($type === 'new') {
            $userPrompt = "Viết một đoạn giới thiệu bản thân (~150 từ). Tôi tên là $name, là $job, có $experience kinh nghiệm. Điểm mạnh: $strengths. Văn phong chuyên nghiệp, thân thiện.";
        } else {
            $userPrompt = "Giúp tôi chỉnh sửa đoạn văn sau để trôi chảy, đúng ngữ pháp và chuyên nghiệp hơn: \"$content\"";
        }

        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Bạn là chuyên gia viết nội dung hồ sơ cá nhân chuyên nghiệp.'
                ],
                [
                    'role' => 'user',
                    'content' => $userPrompt
                ],
            ],
            'temperature' => 0.7,
        ]);

        if ($response->successful()) {
            $aiContent = $response['choices'][0]['message']['content'] ?? 'Không có nội dung phản hồi.';
        } else {
            $aiContent = 'Lỗi API: ' . $response->status() . ' - ' . $response->body();
        }

        return back()->with('ai_intro', $aiContent)->withInput();
    }

    public function callAIFromGroq(Request $request)
    {
        $type = $request->input('type');
        $content = $request->input('content');
        $name = $request->input('name');
        $job = $request->input('job');
        $experience = $request->input('experience');
        $strengths = $request->input('strengths');

        if ($type === 'new') {
            $userPrompt = "Viết một đoạn giới thiệu bản thân bằng tiếng việt (~150 từ). Tôi tên là $name, là $job, có $experience kinh nghiệm. Điểm mạnh: $strengths. Văn phong chuyên nghiệp, thân thiện.";
        } else {
            $userPrompt = "Giúp tôi chỉnh sửa đoạn văn sau để trôi chảy, đúng ngữ pháp và chuyên nghiệp hơn: \"$content\"";
        }

        $response = Http::withToken(env('GROQ_API_KEY'))->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama3-70b-8192', // hoặc llama3-8b-8192
            'messages' => [
                ['role' => 'user', 'content' => $userPrompt],
            ],
            'temperature' => 0.7,
        ]);

        if ($response->successful()) {
            $aiContent = $response['choices'][0]['message']['content'];
        } else {
            $aiContent = 'Lỗi từ Groq API: ' . $response->status() . ' - ' . $response->body();
        }

        return back()->with('ai_intro', $aiContent)->withInput();
    }
}
