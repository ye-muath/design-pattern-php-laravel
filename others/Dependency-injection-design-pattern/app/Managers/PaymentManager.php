<?php

namespace App\Managers;

use App\Contracts\PaymentGatewayInterface;

class PaymentManager {
    private PaymentGatewayInterface $gateway;

    // يتم حقن التبعية من خلال المنشئ
    public function __construct(PaymentGatewayInterface $gateway) {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount): void {
        $this->gateway->pay($amount);
    }
}
