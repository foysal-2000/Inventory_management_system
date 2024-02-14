<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('billing', function () {
            $user = auth()->user();
            if ($user->role_name == User::cashier)
            {
                return true;
            } 
           
        });
        Gate::define('products', function () {
            $user = auth()->user();
            if ($user->role_name == User::warehouse_operator||$user->role_name == User::manager ||$user->role_name == User::admin)
            {
                return true;
            } 
           
        });
        Gate::define('all', function () {
            $user = auth()->user();
            if ($user->role_name == User::admin ||$user->role_name == User::manager)
            {
                return true;
            } 
           
        });
    }
}
