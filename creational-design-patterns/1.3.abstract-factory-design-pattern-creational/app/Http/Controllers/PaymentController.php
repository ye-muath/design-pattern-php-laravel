<?php

namespace App\Http\Controllers;

use App\Factories\PaymentGatewayFactoryInterface;
use App\Factories\PayPalPaymentGatewayFactory;
use App\Factories\StripePaymentGatewayFactory;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment($payment_name, $amount)
    {
        if ($payment_name == 'paypal'){
            $payment_gateway_factory = new PayPalPaymentGatewayFactory();
        }elseif ($payment_name = 'stripe'){
            $payment_gateway_factory = new StripePaymentGatewayFactory();

        }

        $payment_gateway= $payment_gateway_factory->createPaymentGateway();
        return $payment_gateway->processPayment($amount);
    }
}
