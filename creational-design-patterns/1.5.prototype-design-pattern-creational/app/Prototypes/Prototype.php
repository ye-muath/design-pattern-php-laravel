<?php

namespace App\Prototypes;

interface Prototype
{
    public function clone(): Prototype;
}
