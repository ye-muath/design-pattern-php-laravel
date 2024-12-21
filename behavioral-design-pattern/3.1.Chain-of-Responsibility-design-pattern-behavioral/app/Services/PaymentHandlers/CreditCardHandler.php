<?php

namespace App\Services\PaymentHandlers;

use App\Services\PaymentHandlers\Interfaces\PaymentHandlerInterface;

class CreditCardHandler implements PaymentHandlerInterface {
    private $nextHandler;

    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $paymentData): ?string {
        if ($paymentData['method'] === 'credit_card') {
            return "Payment processed using Credit Card : {$paymentData['amount']}.";
        }

        return $this->nextHandler ? $this->nextHandler->handle($paymentData) : null;
    }
}
