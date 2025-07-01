<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Những sự kiện và listener cần đăng ký.
     */
    protected $listen = [
        // Nếu bạn dùng SocialiteProviders cho LinkedIn:
        SocialiteWasCalled::class => [
            'SocialiteProviders\\LinkedIn\\LinkedInExtendSocialite@handle',
        ],
    ];

    public function boot(): void
    {
        //
    }
}
