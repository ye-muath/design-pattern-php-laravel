<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/{type}', [ReportController::class, 'generateReport']);
