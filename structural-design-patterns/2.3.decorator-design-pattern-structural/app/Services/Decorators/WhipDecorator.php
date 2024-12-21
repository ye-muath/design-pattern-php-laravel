<?php

namespace App\Services\Decorators;
use App\Services\Decorators\CoffeeDecorator;

class WhipDecorator extends CoffeeDecorator
{
    public function getCost(): int
    {
        return $this->coffee->getCost() + 3;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ", Whip";
    }
}
