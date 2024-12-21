<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class StripeGateway implements PaymentGatewayInterface {
    public function pay(float $amount): void {
        echo "تم الدفع باستخدام Stripe بمبلغ: $amount" . PHP_EOL;
    }
}