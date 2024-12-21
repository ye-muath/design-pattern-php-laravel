<?php

use App\Notifications\EmailNotificationSender;
use App\Notifications\NotificationBridge;
use App\Notifications\SmsNotificationSender;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('EmailNotificationSender', function () {
 // Use EmailNotificationSender
 $emailSender = new EmailNotificationSender();
 $notification = new NotificationBridge($emailSender);
 $notification->send('This is an email notification.');
});


Route::get('SmsNotificationSender', function () {
    // Use EmailNotificationSender
 // Use SmsNotificationSender
    $smsSender = new SmsNotificationSender();
    $notification = new NotificationBridge($smsSender);
    $notification->send('This is an SMS notification.');
    });

