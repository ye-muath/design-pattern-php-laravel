<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ApiServiceInterface;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiServiceInterface $apiService)
    {
        $this->apiService = $apiService;
    }

    public function fetchData()
    {
        $data = $this->apiService->fetchData('https://nets-project.tawajood.com/api/about-us');
        return response()->json($data);
    }

}
