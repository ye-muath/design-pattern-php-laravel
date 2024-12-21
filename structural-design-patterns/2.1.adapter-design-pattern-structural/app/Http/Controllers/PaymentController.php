<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\Interfaces\PaymentInterface;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function processPayment($amount)
    {
        $this->paymentService->pay($amount);
    }
}
