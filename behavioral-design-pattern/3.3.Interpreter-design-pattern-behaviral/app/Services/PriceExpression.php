<?php

namespace App\Services;

use App\Interfaces\ExpressionInterface; 

class PriceExpression implements ExpressionInterface
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function interpret($query)
    {
        return $query->where('price', '>', $this->price);
    }
}

