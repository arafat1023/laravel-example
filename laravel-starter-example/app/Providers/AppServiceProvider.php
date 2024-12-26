<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

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
        View::share('appName', Config::get('app.name')); // Sharing the application name
        View::share('appDescription', 'A simple project management app.'); // Sharing a static string
        View::share('currentYear', date('Y')); // Sharing the current year
    }
}
