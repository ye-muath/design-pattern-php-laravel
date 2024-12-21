<?php

use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/process-payment', [PaymentController::class, 'makePayment']);

