<?php

namespace JCS\RolePermission\Providers;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/rolepermission.php' => config_path('rolepermission.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \JCS\RolePermission\Commands\CreateSuperAdminCommand::class,
                // Other commands
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/rolepermission.php', 'rolepermission');
    }
}
