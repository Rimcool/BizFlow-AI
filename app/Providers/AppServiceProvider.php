<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Register payment services
        $this->app->singleton(\App\Services\StripeService::class, function ($app) {
            return new \App\Services\StripeService();
        });
        
        $this->app->singleton(\App\Services\JazzCashService::class, function ($app) {
            return new \App\Services\JazzCashService();
        });
        
        $this->app->singleton(\App\Services\EasyPaisaService::class, function ($app) {
            return new \App\Services\EasyPaisaService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

       
    }
}