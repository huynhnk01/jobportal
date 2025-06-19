<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class CandidateInfoController extends Controller
{
    /**
     * Display the candidate's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View|RedirectResponse
    {
        if (!$request->user()->init_profile) {
            return redirect()->route('profile.init.index');
        }

        return view('profile.candidate.info');
    }

    /**
     * Show the form for editing the user's basic information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function editBasicInfo(Request $request): View
    {
        return view('profile.candidate.basic-info', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's basic information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBasicInfo(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;

            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        }

        $user->update($validated);

        return response()->json(['message' => 'Cập nhật thành công']);
    }

    /**
     * Call AI service to generate or edit introduction content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callAIFromGroq(Request $request)
    {
        $type = $request->input('type');
        $name = Auth::user()->name;
        $title = $request->input('title');
        $experience = $request->input('experience');
        $skills = $request->input('skills');
        $content = $request->input('content');

        if ($type === 'new') {
            $userPrompt = "Viết một đoạn giới thiệu bản thân bằng tiếng việt (~150 từ). Tôi tên là $name, là $title, có $experience năm kinh nghiệm. Điểm mạnh: $skills. Văn phong chuyên nghiệp, thân thiện.";
        } else {
            $userPrompt = "Giúp tôi chỉnh sửa đoạn văn sau để trôi chảy, đúng ngữ pháp tiếng việt và chuyên nghiệp hơn: \"$content\"";
        }

        $response = Http::withToken(env('GROQ_API_KEY'))->post(env('GROQ_API_ENDPOINT'), [
            'model' => env('GROQ_API_MODEL'),
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

        return response()->json(['ai_intro' => $aiContent]);
    }
}
