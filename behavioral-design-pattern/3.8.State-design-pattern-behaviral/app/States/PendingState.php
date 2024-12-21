<?php

namespace App\States;

class PendingState extends AbstractOrderState
{
    public function getStatus(): string
    {
        return 'Pending';
    }

    public function proceedToNext(): OrderStateInterface
    {
        return new ProcessingState();
    }

    public function cancel(): OrderStateInterface
    {
        return new CancelledState();
    }
}
