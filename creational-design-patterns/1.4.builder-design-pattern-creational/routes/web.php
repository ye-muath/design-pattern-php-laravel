<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/report/simple', [ReportController::class, 'simpleReport']);
Route::get('/report/complex', [ReportController::class, 'complexReport']);
