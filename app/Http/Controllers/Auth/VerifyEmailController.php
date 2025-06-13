<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Verified;

use App\Http\Controllers\Controller;

/**
 * Controller to handle email verification for authenticated users.
 */
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
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('home', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('home', absolute: false).'?verified=1');
    }
}
