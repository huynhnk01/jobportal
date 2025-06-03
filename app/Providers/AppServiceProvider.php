<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $host = Request::getHost();

        if (!str_ends_with($host, '.local')) {
            URL::forceScheme('https'); // dùng khi cần force schema https để có thể redirect đúng url
            // URL::forceRootUrl(config('app.url')); // dùng khi cần force action trong form đúng với APP_URL
        }
    }
}
