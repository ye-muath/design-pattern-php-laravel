<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayInterface;
use App\Services\PayPalGateway;
use App\Services\StripeGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
             // تسجيل ديناميكي بناءً على الإعدادات
             $this->app->bind(PaymentGatewayInterface::class, function ($app) {
                $preferredGateway = config('services.payment_gateway', 'paypal');
                
                return match ($preferredGateway) {
                    'paypal' => new PayPalGateway(),
                    'stripe' => new StripeGateway(),
                    default => throw new \Exception("بوابة الدفع غير مدعومة"),
                };
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
