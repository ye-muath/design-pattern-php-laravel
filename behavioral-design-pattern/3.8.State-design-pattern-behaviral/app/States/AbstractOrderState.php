<?php

namespace App\States;

use App\Models\Order;

abstract class AbstractOrderState implements OrderStateInterface
{
    protected Order $order;

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }
}
