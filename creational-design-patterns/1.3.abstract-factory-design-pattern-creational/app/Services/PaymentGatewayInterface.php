<?php

namespace App\Services;

interface PaymentGatewayInterface
{
    public function processPayment(float $amount): string;
}
