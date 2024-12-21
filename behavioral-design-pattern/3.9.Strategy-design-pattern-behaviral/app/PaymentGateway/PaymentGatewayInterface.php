<?php

namespace App\PaymentGateway;

interface PaymentGatewayInterface
{
    public function pay($amount);
}
