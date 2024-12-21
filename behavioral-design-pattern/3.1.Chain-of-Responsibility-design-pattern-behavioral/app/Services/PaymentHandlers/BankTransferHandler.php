<?php

namespace App\Services\PaymentHandlers;

use App\Services\PaymentHandlers\Interfaces\PaymentHandlerInterface;

class BankTransferHandler implements PaymentHandlerInterface {
    private $nextHandler;

    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $paymentData): ?string {
        if ($paymentData['method'] === 'bank_transfer') {
            return "Payment processed using Bank Transfer with money : {$paymentData['amount']}.";
        }

        return $this->nextHandler ? $this->nextHandler->handle($paymentData) : null;
    }
}
