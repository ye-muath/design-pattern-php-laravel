<?php

namespace App\Http\Controllers\Order;

use App\Commands\Services\CancelOrderCommand;
use App\Commands\Services\PlaceOrderCommand;
use App\Commands\Services\CommandInvoker;
use App\Commands\Services\ShipOrderCommand;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function manageOrder()
    {
        $first = Order::find(1); // Example order ID
        $second = Order::find(2); // Example order ID
        $three = Order::find(3); // Example order ID

        $invoker = new CommandInvoker();

        // Add commands to the invoker
        $invoker->addCommand(new PlaceOrderCommand($first));
        $invoker->addCommand(new ShipOrderCommand($second));
        $invoker->addCommand(new CancelOrderCommand($three));

        // Execute all commands
        $invoker->executeCommands();

        return response()->json([
            'first'    => $first,
            'second'   => $second,
            'three'    => $three
        ]);
    }
}
