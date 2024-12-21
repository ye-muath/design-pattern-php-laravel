<?php

namespace App\Interfaces;

interface CategoryComponent
{
    public function getName(): string;
    public function render(): string;
}
