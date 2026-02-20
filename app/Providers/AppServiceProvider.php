<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('admin', function (User $user) {
            // return false;
           return $user->id === 1; // if you want to give admin access to the user with ID 1
            // return $user->is_admin;// Assuming you have an 'is_admin' field in your users table, like role-based access control
        });
    }
}
