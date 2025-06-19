<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class CandidateInfoController extends Controller
{
    /**
     * Display the user's personal profile page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
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

    public function callAIFromGroq(Request $request)
    {
        $type = $request->input('type');
        $name = Auth::user()->name;
        $job = $request->input('job') ?? 'Kỹ sư phần mềm';
        $experience = $request->input('yoe');
        $skills = $request->input('skills');
        $content = '';

        if ($type === 'new') {
            $userPrompt = "Viết một đoạn giới thiệu bản thân bằng tiếng việt (~150 từ). Tôi tên là $name, là $job, có $experience kinh nghiệm. Điểm mạnh: $skills. Văn phong chuyên nghiệp, thân thiện.";
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

        return response()->json(['ai_intro' => $aiContent]);
    }
}
