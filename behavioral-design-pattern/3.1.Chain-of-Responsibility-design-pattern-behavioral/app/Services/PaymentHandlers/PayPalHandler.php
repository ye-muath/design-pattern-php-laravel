<?php

namespace App\Services\PaymentHandlers;

use App\Services\PaymentHandlers\Interfaces\PaymentHandlerInterface;

class PayPalHandler implements PaymentHandlerInterface {
    private $nextHandler;

    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $paymentData): ?string {
        if ($paymentData['method'] === 'paypal') {
            return "Payment processed using PayPal : {$paymentData['amount']}.";
        }

        return $this->nextHandler ? $this->nextHandler->handle($paymentData) : null;
    }
}
