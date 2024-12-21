<?php

namespace App\Services;

class VeggiePizza extends PizzaMaker
{
    protected function addIngredients(): string
    {
        return "Adding tomato sauce, mozzarella cheese, bell peppers, onions, and olives...\n";
    }
}
