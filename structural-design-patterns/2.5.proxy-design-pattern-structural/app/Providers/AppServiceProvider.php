<?php

namespace App\Providers;

use App\Services\Classes\ApiServiceProxy;
use App\Services\Classes\RealApiService;
use App\Services\Interfaces\ApiServiceInterface;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ApiServiceInterface::class, function ($app) {
            return new ApiServiceProxy(new RealApiService());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
