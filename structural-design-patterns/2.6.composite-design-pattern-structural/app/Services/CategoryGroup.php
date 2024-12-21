<?php

namespace App\Services;

use App\Interfaces\CategoryComponent;
use Illuminate\Support\Collection;

class CategoryGroup implements CategoryComponent
{
    private string $name;
    private Collection $children;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->children = collect();
    }

    public function add(CategoryComponent $component): void
    {
        $this->children->push($component);
    }

    public function remove(CategoryComponent $component): void
    {
        $this->children = $this->children->reject(fn($child) => $child === $component);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): string
    {
        $output = "{$this->name}:\n";
        foreach ($this->children as $child) {
            $output .= "- " . $child->render() . "\n";
        }
        return $output;
    }
}
