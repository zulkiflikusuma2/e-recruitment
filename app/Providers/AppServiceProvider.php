<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('superadmin', function(User $user){
            return $user->role === 'superadmin';
        });
        Gate::define('adminNsuper', function(User $user){
            return $user->role === 'admin' || $user->role === 'superadmin' ;
        });
        Gate::define('applicant', function(User $user){
            return $user->role === 'applicant';
        });
    }
}
