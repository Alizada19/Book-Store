<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;

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
        // Register Spatie middleware
         Route::aliasMiddleware('role', RoleMiddleware::class);
         Route::aliasMiddleware('permission', PermissionMiddleware::class);
         Route::aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);
    }
}
