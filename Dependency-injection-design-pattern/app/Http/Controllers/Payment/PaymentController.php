<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Managers\PaymentManager;

class PaymentController extends Controller {
    private PaymentManager $paymentManager;

    public function __construct(PaymentManager $paymentManager) {
        $this->paymentManager = $paymentManager;
    }

    public function makePayment(float $amount = 500): void {
        $this->paymentManager->processPayment($amount);
    }
}
