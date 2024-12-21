<?php
// app/Notifications/NotificationSender.php

namespace App\Notifications;

interface NotificationSender
{
    public function send(string $message): void;
}
