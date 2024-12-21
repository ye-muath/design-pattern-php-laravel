<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\States\OrderStateInterface;
use App\States\PendingState;
use App\States\ProcessingState;
use App\States\CompletedState;
use App\States\CancelledState;

class Order extends Model
{
    protected $fillable = ['state'];

    public function getStateAttribute(): OrderStateInterface
    {
        return match ($this->attributes['state']) {
            'Pending' => new PendingState(),
            'Processing' => new ProcessingState(),
            'Completed' => new CompletedState(),
            'Cancelled' => new CancelledState(),
            default => throw new \Exception('Invalid state'),
        };
    }

    public function setStateAttribute(OrderStateInterface $state): void
    {
        $this->attributes['state'] = $state->getStatus();
    }

    public function proceedToNextState(): void
    {
        $state = $this->state;
        $state->setOrder($this);
        $this->state = $state->proceedToNext();
        $this->save();
    }

    public function cancelOrder(): void
    {
        $state = $this->state;
        $state->setOrder($this);
        $this->state = $state->cancel();
        $this->save();
    }
}
