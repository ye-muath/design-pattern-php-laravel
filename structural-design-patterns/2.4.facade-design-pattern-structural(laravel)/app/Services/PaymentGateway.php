<?php

namespace App\Services;

use App\Models\User;
use Faker\Factory;

class PaymentGateway
{
    public static function process($amount)
    {
        // Payment processing logic
        return "Processing payment of $amount";
    }
}
