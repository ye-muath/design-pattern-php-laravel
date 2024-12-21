<?php

namespace App\Services;

class NotificationService
{
    public function sendWelcomeEmail($user): void
    {
        // Logic to send welcome email
        echo "Welcome email sent to {$user->email}\n";
    }

    public function sendGoodbyeEmail($user): void
    {
        // Logic to send goodbye email
        echo "Goodbye email sent to {$user->email}\n";
    }
}
