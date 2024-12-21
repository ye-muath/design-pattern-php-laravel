<?php

namespace App\Services\Interfaces;

interface ApiServiceInterface
{
    public function fetchData(string $endpoint): array;
}
