<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Verified;

use App\Http\Controllers\Controller;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming email verification request.
     *
     * @param \Illuminate\Foundation\Auth\EmailVerificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return $this->redirectAfterVerification($user);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return $this->redirectAfterVerification($user);
    }

    /**
     * Redirect the user after email verification.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectAfterVerification($user): RedirectResponse
    {
        if (!$user->init_profile) {
            return redirect()->route('profile.init.index');
        }

        return redirect()->intended(route('home', absolute: false) . '?verified=1');
    }
}
