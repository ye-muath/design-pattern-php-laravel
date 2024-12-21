<?php
// app/Notifications/Notification.php

namespace App\Notifications;

class NotificationBridge
{
    protected $sender;

    public function __construct(NotificationSender $sender)
    {
        $this->sender = $sender;
    }

    public function send(string $message): void
    {
        $this->sender->send($message);
    }
}
