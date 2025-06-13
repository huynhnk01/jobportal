<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Controller to handle social login functionality.
 */
class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the social provider's authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the social provider and log them in.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider): RedirectResponse
    {
        /** @var \Laravel\Socialite\Two\AbstractProvider $providerDriver */
        $providerDriver = Socialite::driver($provider);

        $socialUser = $providerDriver->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName() ?? $socialUser->getNickname(),
            'avatar' => $socialUser->getAvatar(),
            'password' => bcrypt('123456'),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
        ]);

        Auth::login($user);

        return redirect()->intended(route('home', absolute: false));
    }
}
