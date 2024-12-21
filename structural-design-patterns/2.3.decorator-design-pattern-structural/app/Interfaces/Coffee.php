<?php

namespace App\Interfaces;

interface Coffee
{
    public function getCost(): int;
    public function getDescription(): string;
}
