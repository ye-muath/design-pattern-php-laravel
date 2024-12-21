<?php

namespace App\Services;

class PepperoniPizza extends PizzaMaker
{
    protected function addIngredients(): string
    {
        return "Adding tomato sauce, mozzarella cheese, and pepperoni slices...\n";
    }
}
