<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class PayPalGateway implements PaymentGatewayInterface {
    public function pay(float $amount): void {
        echo "تم الدفع باستخدام PayPal بمبلغ: $amount" . PHP_EOL;
    }
}

