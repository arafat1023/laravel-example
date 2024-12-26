<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Project;
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

        View::composer(['projects.index', 'projects.show'], function ($view) {
            $recentProjects = Project::latest()->take(2)->get(); // Get the 5 most recent projects
            $view->with('recentProjects', $recentProjects); // Share the data with the view
        });

        View::composer('*', function ($view) { // The * wildcard applies to all views
            $categories = [
                'Web Development',
                'Mobile Development',
                'Design',
                'Marketing',
            ];
            $view->with('categories', $categories);
            $view->with('siteTitle', 'My Awesome Project Manager'); // Example of sharing a basic string
        });

    }
}
