<?php

namespace App\Services;

class ProductFlyweightFactory
{
    private array $flyweights = [];

    public function getFlyweight(string $category, string $brand): ProductFlyweight
    {
        $key = md5($category . $brand);

        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new ProductFlyweight($category, $brand);
        }

        return $this->flyweights[$key];
    }
}
