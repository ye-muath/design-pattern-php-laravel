<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Order\OrderController;


Route::get('/{id}', [OrderController::class, 'proceedOrder']);


