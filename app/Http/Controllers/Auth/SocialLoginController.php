<?php

// app/Http/Controllers/Auth/SocialLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
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

        return redirect()->route('home'); // điều hướng sau khi đăng nhập
    }
}
