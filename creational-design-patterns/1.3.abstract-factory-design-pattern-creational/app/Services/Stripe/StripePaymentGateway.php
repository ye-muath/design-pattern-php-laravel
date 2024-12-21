<?php

namespace App\Services\Stripe;

use App\Services\PaymentGateway;
use App\Services\PaymentGatewayInterface;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function processPayment(float $amount): string
    {
        // Stripe-specific payment processing
        return "Processing $amount payment through Stripe.";
    }
}
