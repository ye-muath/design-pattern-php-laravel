<?php

namespace App\Services\PaymentHandlers\Interfaces;

interface PaymentHandlerInterface {
    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface;
    public function handle(array $paymentData): ?string;
}
