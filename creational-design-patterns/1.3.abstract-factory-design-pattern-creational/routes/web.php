<?php

use App\Factories\PayPalPaymentGatewayFactory;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/{paypal}/{amount}', [PaymentController::class, 'createPayment']);
Route::get('/{stripe}/{amount}', [PaymentController::class, 'createPayment']);
