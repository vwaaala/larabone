<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }
    }

    /**
     * Bootstraps the application.
     * This method is called automatically when the application is booted.
     */
    public function boot(): void
    {
        // Enable the usage of Bootstrap 5 styling for pagination
        Paginator::useBootstrapFive();
    }

}
