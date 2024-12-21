<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\PaymentProcessorController;
use App\PaymentGateway\PayPalGateway;
use App\PaymentGateway\StripeGateway;


Route::get('/', function () {
    // Using PayPal
$paypalProcessor = new PaymentProcessorController(new PayPalGateway());
echo $paypalProcessor->processPayment(100); // Output: Paying 100 via PayPal.
echo "<br/>";
// Using Stripe
$stripeProcessor = new PaymentProcessorController(new StripeGateway());
echo $stripeProcessor->processPayment(50); // Output: Paying 50 via Stripe.

echo "<br/>";

    return "لا حول ولا قوة الا بالله العلى العظيم";
});
