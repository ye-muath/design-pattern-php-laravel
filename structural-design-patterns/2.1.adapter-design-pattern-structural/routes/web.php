<?php

use App\Http\Controllers\PaymentController;
use App\Services\NewPaymentAdapter;
use App\Services\NewPaymentGateway;
use App\Services\OldPaymentService;
use Illuminate\Support\Facades\Route;

Route::get('old-payment-service/{amount?}', function ($amount = 0){
   $old_payment_service = new OldPaymentService();
   $payment_controller  = new PaymentController($old_payment_service);
   $payment_controller->processPayment($amount);
});

Route::get('new-payment-service/{amount?}', function ($amount = 0){
    $new_payment_gateway        = new NewPaymentGateway();
    $new_payment_service_adapter = new NewPaymentAdapter($new_payment_gateway);
    $payment_controller  = new PaymentController($new_payment_service_adapter);
    $payment_controller->processPayment($amount);
 });
