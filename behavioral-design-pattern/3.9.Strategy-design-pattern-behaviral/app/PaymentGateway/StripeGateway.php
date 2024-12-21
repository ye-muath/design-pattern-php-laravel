<?php

namespace App\PaymentGateway;

class StripeGateway implements PaymentGatewayInterface
{
    public function pay($amount)
    {
        // Implementation for Stripe payment
        return "Paying $amount via Stripe.";
    }
}
