<?php

namespace App\Services;

use App\Interfaces\ExpressionInterface; 

class AndExpression implements ExpressionInterface
{
    private $expression1;
    private $expression2;

    public function __construct(ExpressionInterface $expr1, ExpressionInterface $expr2)
    {
        $this->expression1 = $expr1;
        $this->expression2 = $expr2;
    }

    public function interpret($query)
    {
        $query = $this->expression1->interpret($query);
        return $this->expression2->interpret($query);
    }
}
