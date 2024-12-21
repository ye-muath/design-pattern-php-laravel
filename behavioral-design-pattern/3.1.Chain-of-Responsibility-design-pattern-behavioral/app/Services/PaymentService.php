<?php

namespace App\Services;

use App\Services\PaymentHandlers\BankTransferHandler;
use App\Services\PaymentHandlers\CreditCardHandler;
use App\Services\PaymentHandlers\PayPalHandler;

class PaymentService {
    public function processPayment(array $paymentData): string {
        // Create handlers
        $creditCardHandler = new CreditCardHandler();
        $paypalHandler = new PayPalHandler();
        $bankTransferHandler = new BankTransferHandler();

        // Construct the chain
        $creditCardHandler->setNext($paypalHandler)->setNext($bankTransferHandler);

        // Start processing the payment
        $result = $creditCardHandler->handle($paymentData);

        return $result ?? "Payment method not supported.";
    }
}
