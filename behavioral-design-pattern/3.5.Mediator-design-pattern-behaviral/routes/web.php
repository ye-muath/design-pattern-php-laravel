<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/create-user', [UserController::class, 'createUser']);
Route::get('/delete-user', [UserController::class, 'deleteUser']);
