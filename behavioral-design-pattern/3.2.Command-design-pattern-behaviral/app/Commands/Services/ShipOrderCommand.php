<?php
namespace App\Commands\Services;

use App\Commands\Interfaces\CommandInterface;
use App\Models\Order;

class ShipOrderCommand implements CommandInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function execute()
    {
        // Logic to ship the order
        $this->order->status = 'shipped';
        $this->order->save();
    }
}