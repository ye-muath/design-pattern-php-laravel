<?php
// app/Interfaces/PaymentInterface.php
namespace App\Interfaces;

interface PaymentInterface
{
    public function pay($amount);
}
