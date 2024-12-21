<?php
namespace App\Commands\Services;

use App\Commands\Interfaces\CommandInterface;
use App\Models\Order;

class CancelOrderCommand implements CommandInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function execute()
    {
        // Logic to cancel the order
        $this->order->status = 'cancelled';
        $this->order->save();
    }
}