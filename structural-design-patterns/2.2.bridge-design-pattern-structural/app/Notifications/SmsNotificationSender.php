<?php
// app/Notifications/SmsNotificationSender.php

namespace App\Notifications;

class SmsNotificationSender implements NotificationSender
{
    public function send(string $message): void
    {
        // Logic to send SMS
        // Example: Using Twilio SDK
        // $twilio = new \Twilio\Rest\Client($sid, $token);
        // $twilio->messages->create($to, ['from' => $from, 'body' => $message]);

        echo $message;
    }
}
