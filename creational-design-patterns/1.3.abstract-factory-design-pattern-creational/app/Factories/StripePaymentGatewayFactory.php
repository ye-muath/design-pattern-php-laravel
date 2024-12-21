<?php

namespace App\Factories;

use App\Services\Stripe\StripePaymentGateway;
use App\Services\PaymentGateway;
use App\Services\PaymentGatewayInterface;

class StripePaymentGatewayFactory implements PaymentGatewayFactoryInterface
{
    public function createPaymentGateway(): PaymentGatewayInterface
    {
        return new StripePaymentGateway();
    }
}
