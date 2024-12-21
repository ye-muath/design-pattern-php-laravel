<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MargheritaPizza;
use App\Services\PepperoniPizza;
use App\Services\VeggiePizza;

class PizzaController extends Controller
{
    public function showMenu()
    {
        return view('pizza-menu');
    }

    public function orderPizza(Request $request)
    {
        $request->validate([
            'pizzaType' => 'required|in:margherita,pepperoni,veggie',
        ]);

        // تحديد نوع البيتزا
        $pizza = match ($request->pizzaType) {
            'margherita' => new MargheritaPizza(),
            'pepperoni' => new PepperoniPizza(),
            'veggie' => new VeggiePizza(),
        };

        // تحضير البيتزا
        $result = $pizza->makePizza();

        return view('pizza-menu', ['result' => $result]);
    }
}
