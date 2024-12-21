<?php

use App\Http\Controllers\Pizza\PizzaController;
use Illuminate\Support\Facades\Route;


Route::get('/pizza-menu', [PizzaController::class, 'showMenu'])->name('pizza.menu');
Route::post('/order-pizza', [PizzaController::class, 'orderPizza'])->name('pizza.order');

