<?php

namespace App\Services;
use App\Interfaces\Coffee;

class SimpleCoffee implements Coffee
{
    public function getCost(): int
    {
        return 5;
    }

    public function getDescription(): string
    {
        return "Simple Coffee";
    }
}
