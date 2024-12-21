<?php

namespace App\Services;

class ProductFlyweight
{
    private string $category;
    private string $brand;
    public static $counter = 0;

    public function __construct(string $category, string $brand)
    {
        $this->category = $category;
        $this->brand = $brand;
        self::$counter++;
    }

    public function render(string $name, float $price): string
    {
        return "Product: {$name}, Category: {$this->category}, Brand: {$this->brand}, Price: \${$price}";
    }
}
