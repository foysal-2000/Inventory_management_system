<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            // Define your validation logic here
            return preg_match('/^[a-zA-Z0-9_]+$/', $value); // Example: Allow only letters, numbers, and underscores
        });
    }
}
