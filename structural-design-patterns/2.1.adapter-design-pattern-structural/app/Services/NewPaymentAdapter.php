<?php
// app/Services/NewPaymentAdapter.php
namespace App\Services;

use App\Interfaces\PaymentInterface;

class NewPaymentAdapter implements PaymentInterface
{
    protected $newPaymentGateway;

    public function __construct(NewPaymentGateway $newPaymentGateway)
    {
        $this->newPaymentGateway = $newPaymentGateway;
    }

    public function pay($amount)
    {
        // Use the new payment gateway to process the payment
        $this->newPaymentGateway->sendPayment($amount);
    }
}
