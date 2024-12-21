<?php

namespace App\Services;

abstract class PizzaMaker
{
    // الخطوات العامة لتحضير البيتزا
    public function makePizza(): string
    {
        $output = "Starting pizza preparation...\n";
        $output .= $this->prepareDough();
        $output .= $this->addIngredients();
        $output .= $this->bakePizza();
        $output .= "Pizza is ready to serve!\n";

        return $output;
    }

    // الخطوات المشتركة
    protected function prepareDough(): string
    {
        return "Preparing the dough...\n";
    }

    // الخطوة المتغيرة
    abstract protected function addIngredients(): string;

    protected function bakePizza(): string
    {
        return "Baking the pizza at 200°C for 15 minutes...\n";
    }
}
