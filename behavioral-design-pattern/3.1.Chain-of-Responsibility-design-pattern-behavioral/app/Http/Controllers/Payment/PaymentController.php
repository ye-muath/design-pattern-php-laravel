<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function makePayment(Request $request) {
        $paymentService = new PaymentService();

        $paymentData = [
            'method' => $request->input('method'), // e.g., 'credit_card', 'paypal', 'bank_transfer'
            'amount' => $request->input('amount'),
        ];

        $result = $paymentService->processPayment($paymentData);

        return response()->json(['message' => $result]);
    }
}
