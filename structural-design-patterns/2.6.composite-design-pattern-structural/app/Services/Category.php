<?php

namespace App\Services;

use App\Interfaces\CategoryComponent;

class Category implements CategoryComponent
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): string
    {
        return "- {$this->name}";
    }
}
