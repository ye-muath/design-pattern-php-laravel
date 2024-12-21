<?php

namespace App\Services\Classes;

use App\Services\Interfaces\ApiServiceInterface;
use Illuminate\Support\Facades\Http;

class RealApiService implements ApiServiceInterface
{
    public function fetchData(string $endpoint): array
    {
        $response = Http::get($endpoint);
        return $response->json();
    }
}
