<?php

use App\Facades\Payment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return Payment::process(100);
    });
