<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentGateway\PaymentGatewayInterface;

class PaymentProcessorController extends Controller
{

    protected $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function processPayment($amount)
    {
        return $this->paymentGateway->pay($amount);
    }
}

