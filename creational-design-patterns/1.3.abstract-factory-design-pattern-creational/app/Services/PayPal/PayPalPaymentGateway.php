<?php

namespace App\Services\PayPal;

use App\Services\PaymentGateway;
use App\Services\PaymentGatewayInterface;

class PayPalPaymentGateway implements PaymentGatewayInterface
{
    public function processPayment(float $amount): string
    {
        // PayPal-specific payment processing
        return "Processing $amount payment through PayPal.";
    }
}
