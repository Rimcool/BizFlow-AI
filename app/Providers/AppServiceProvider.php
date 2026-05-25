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
    
        Schema::defaultStringLength(191);

 
        view()->composer('*', function ($view) {
            $business = null;

            if (request()->route()) {
                // Get parameter "business" (because route is /preview/{business})
                $param = request()->route()->parameter('business');

                if ($param) {
                    // If it's already a Business model (route model binding), use it directly
                    $business = $param instanceof \App\Models\Business
                        ? $param
                        : \App\Models\Business::find($param);
                }
            }

            // Fallback → first business if nothing found
            if (!$business) {
                $business = \App\Models\Business::first();
            }

            $view->with('business', $business);
        })
 