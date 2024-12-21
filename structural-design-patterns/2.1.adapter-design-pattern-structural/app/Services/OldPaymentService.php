<?php
// app/Services/OldPaymentService.php
namespace App\Services;

use App\Interfaces\PaymentInterface;

class OldPaymentService implements PaymentInterface
{
    public function pay($amount)
    {
        // Process payment using the old system
        echo "Paying $amount using Old Payment Service";
    }
}
