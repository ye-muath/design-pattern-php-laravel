<?php
// app/Notifications/EmailNotificationSender.php

namespace App\Notifications;

use Illuminate\Support\Facades\Mail;

class EmailNotificationSender implements NotificationSender
{
    public function send(string $message): void
    {
        // Logic to send email
        // Mail::raw($message, function($msg) {
        //     $msg->to('example@example.com')->subject('Notification');
        // });
        echo $message;
    }
}
