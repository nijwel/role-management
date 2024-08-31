<?php

namespace VendorName\PackageName;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Loading routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Loading views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'packagename');

        // Loading migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register package services
    }
}
