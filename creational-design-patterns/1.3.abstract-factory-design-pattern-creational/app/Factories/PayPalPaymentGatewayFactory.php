<?php

namespace App\Factories;

use App\Services\PayPal\PayPalPaymentGateway;
use App\Services\PaymentGatewayInterface;

class PayPalPaymentGatewayFactory implements PaymentGatewayFactoryInterface
{
    public function createPaymentGateway(): PaymentGatewayInterface
    {
        return new PayPalPaymentGateway();
    }
}
