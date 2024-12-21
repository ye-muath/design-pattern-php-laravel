<?php

use Illuminate\Support\Facades\Route;
use App\Services\SimpleCoffee;
use App\Services\Decorators\MilkDecorator;
use App\Services\Decorators\WhipDecorator;

Route::get('/', function () {

    // Creating a simple coffee
    $someCoffee = new SimpleCoffee();
    echo $someCoffee->getDescription() . "<br/>"; // Simple Coffee
    echo $someCoffee->getCost() . "<br/>"; // 5

    // Adding milk to the coffee
    $someCoffee = new MilkDecorator($someCoffee);
    echo $someCoffee->getDescription() . "<br/>"; // Simple Coffee, Milk
    echo $someCoffee->getCost() . "<br/>"; // 7

    // Adding whip to the coffee
    $someCoffee = new WhipDecorator($someCoffee);
    echo $someCoffee->getDescription() . "<br/>"; // Simple Coffee, Milk, Whip
    echo $someCoffee->getCost() . "<br/>"; // 10


    });
