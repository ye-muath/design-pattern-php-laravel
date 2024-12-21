<?php

namespace App\Mediator;

use App\Services\NotificationService;
use App\Services\LoggerService;

class UserMediator implements MediatorInterface
{
    protected NotificationService $notificationService;
    protected LoggerService $loggerService;

    public function __construct(
        NotificationService $notificationService,
        LoggerService $loggerService
    ) {
        $this->notificationService = $notificationService;
        $this->loggerService = $loggerService;
    }

    public function notify(object $sender, string $event): void
    {
        switch ($event) {
            case 'user_created':
                $this->notificationService->sendWelcomeEmail($sender->getUser());
                $this->loggerService->log("User created: " . $sender->getUser()->email);
                break;

            case 'user_deleted':
                $this->notificationService->sendGoodbyeEmail($sender->getUser());
                $this->loggerService->log("User deleted: " . $sender->getUser()->email);
                break;
        }
    }
}
