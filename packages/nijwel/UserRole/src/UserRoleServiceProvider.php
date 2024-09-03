<?php

namespace Nijwel\UserRole;

use Illuminate\Support\ServiceProvider;

class UserRoleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load routes
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views
        // $this->loadViewsFrom(__DIR__ . '/../views/roles', 'userrole');

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/userrole.php' => config_path('userrole.php'),
        ]);
    }

    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/userrole.php',
            'userrole'
        );
    }

    protected function loadHelpers()
    {
        $helpers = __DIR__ . '/Helpers/helpers.php';

        if (file_exists($helpers)) {
            require_once $helpers;
        }
    }
}