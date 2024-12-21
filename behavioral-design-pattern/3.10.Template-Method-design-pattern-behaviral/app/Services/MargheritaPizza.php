<?php

namespace App\Services;

class MargheritaPizza extends PizzaMaker
{
    protected function addIngredients(): string
    {
        return "Adding tomato sauce, mozzarella cheese, and fresh basil...\n";
    }
}
