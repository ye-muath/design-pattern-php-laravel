<?php

namespace App\States;

interface OrderStateInterface
{
    public function getStatus(): string;
    public function proceedToNext(): OrderStateInterface;
    public function cancel(): OrderStateInterface;
}
