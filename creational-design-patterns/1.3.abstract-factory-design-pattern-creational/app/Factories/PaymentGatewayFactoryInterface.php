<?php

namespace App\Factories;

use App\Services\PaymentGatewayInterface;

interface PaymentGatewayFactoryInterface
{
    public function createPaymentGateway(): PaymentGatewayInterface;
}
