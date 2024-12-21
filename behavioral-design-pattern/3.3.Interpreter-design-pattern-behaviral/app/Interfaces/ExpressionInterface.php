<?php

namespace App\Interfaces;

interface ExpressionInterface
{
    public function interpret($context);
}
