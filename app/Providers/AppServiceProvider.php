<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
 
    public function boot()
{
    Paginator::useBootstrap();
    //Authorization untuk fungsi delete hanya utk admin
    Gate::define('delete-movie', function($user){
        return $user->role === 'admin';
    });
}
}
