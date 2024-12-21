<?php

namespace App\States;

class CompletedState extends AbstractOrderState
{
    public function getStatus(): string
    {
        return 'Completed';
    }

    public function proceedToNext(): OrderStateInterface
    {
        throw new \Exception('Order is already completed.');
    }

    public function cancel(): OrderStateInterface
    {
        throw new \Exception('Completed orders cannot be cancelled.');
    }
}
