<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

/**
 * Controller to handle password confirmation for authenticated users.
 */
class ConfirmablePasswordController extends Controller
{
    /**
     * Show the password confirmation view.
     *
     * @return \Illuminate\View\View
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Store the confirmed password in the session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home', absolute: false));
    }
}
