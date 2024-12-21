<?php

namespace App\States;

class ProcessingState extends AbstractOrderState
{
    public function getStatus(): string
    {
        return 'Processing';
    }

    public function proceedToNext(): OrderStateInterface
    {
        return new CompletedState();
    }

    public function cancel(): OrderStateInterface
    {
        return new CancelledState();
    }
}
