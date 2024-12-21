<?php

namespace App\Services\Classes;

use App\Services\Classes\RealApiService;
use App\Services\Interfaces\ApiServiceInterface;
use Illuminate\Support\Facades\Cache;

class ApiServiceProxy implements ApiServiceInterface
{
    protected $realApiService;

    public function __construct(RealApiService $realApiService)
    {
        $this->realApiService = $realApiService;
    }

    public function fetchData(string $endpoint): array
    {
        return Cache::remember($endpoint, 60, function () use ($endpoint) {
            return $this->realApiService->fetchData($endpoint);
        });
    }
}
