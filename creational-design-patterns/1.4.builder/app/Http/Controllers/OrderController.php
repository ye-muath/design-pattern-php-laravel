<?php

namespace App\Http\Controllers;

use App\Orders\OrderBuilder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $orderBuilder = new OrderBuilder();

        $order = $orderBuilder
            ->setCustomer($request->input('customer')?? 'customer')
            ->addItem($request->input('item1') ?? ['item1'])
            ->addItem($request->input('item2') ?? ['item2'])
            ->setPayment($request->input('payment') ?? 'payment')
            ->setShipping($request->input('shipping') ?? 'shipping')
            ->build();

        return response()->json($order);
    }
}
