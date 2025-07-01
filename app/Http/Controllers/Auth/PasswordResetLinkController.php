<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;

use App\Http\Controllers\Controller;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a password reset link to the given user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(['email' => $validated['email']]);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'success' => true,
                'message' => __($status),
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'EMAIL_NOT_FOUND',
            'message' => __($status),
        ], 422);
    }
}
