<?php

namespace App\PaymentGateway;

class PayPalGateway implements PaymentGatewayInterface
{
    public function pay($amount)
    {
        // Implementation for PayPal payment
        return "Paying $amount via PayPal.";
    }
}
