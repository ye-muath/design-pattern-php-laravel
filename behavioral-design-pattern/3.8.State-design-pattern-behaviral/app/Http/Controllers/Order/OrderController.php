<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(){
        $order = new \App\Models\Order();
        $order->state = new \App\States\PendingState();
        $order->save();
    }
    public function proceedOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->proceedToNextState();

        return response()->json(['message' => 'Order state updated.', 'state' => $order->state->getStatus()]);
    }

    public function cancelOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->cancelOrder();

        return response()->json(['message' => 'Order cancelled.', 'state' => $order->state->getStatus()]);
    }
}
