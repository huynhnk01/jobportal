<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Controller to handle new password requests.
 *
 * This controller provides methods to display the password reset view
 * and to handle the submission of a new password.
 */
class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * This method returns a view for resetting the user's password,
     * passing the request data to the view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle the submission of a new password.
     *
     * This method validates the request data and attempts to reset the user's password.
     * If successful, it returns a JSON response indicating success; otherwise, it returns
     * an error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json(['success' => true]);
        }

        return response()->json([
            'success' => false,
            'message' => __($status),
        ], 422);
    }
}
