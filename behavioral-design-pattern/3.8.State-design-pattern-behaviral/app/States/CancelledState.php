<?php

namespace App\States;

class CancelledState extends AbstractOrderState
{
    public function getStatus(): string
    {
        return 'Cancelled';
    }

    public function proceedToNext(): OrderStateInterface
    {
        throw new \Exception('Cancelled orders cannot proceed to the next state.');
    }

    public function cancel(): OrderStateInterface
    {
        throw new \Exception('Order is already cancelled.');
    }
}
