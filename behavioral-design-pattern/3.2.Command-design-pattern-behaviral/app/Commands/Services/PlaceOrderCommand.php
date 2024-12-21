<?php

namespace App\Commands\Services;

use App\Commands\Interfaces\CommandInterface;
use App\Models\Order;

class PlaceOrderCommand implements CommandInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function execute()
    {
        // Logic to place the order
        $this->order->status = 'placed';
        $this->order->save();
    }
}



