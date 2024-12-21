<?php

namespace App\Services;

use App\Interfaces\ExpressionInterface; 

class CategoryExpression implements ExpressionInterface
{
    private $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function interpret($query)
    {
        return $query->where('category', $this->category);
    }
}
