<?php

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'manageOrder']);
