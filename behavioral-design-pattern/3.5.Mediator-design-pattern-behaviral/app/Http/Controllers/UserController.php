<?php

namespace App\Http\Controllers;

use App\Mediator\UserMediator;
use App\Services\NotificationService;
use App\Services\LoggerService;
use App\Mediator\UserManager;

class UserController extends Controller
{
    public function createUser()
    {
        $notificationService = new NotificationService();
        $loggerService = new LoggerService();

        $mediator = new UserMediator($notificationService, $loggerService);
        $userManager = new UserManager($mediator);

        $userManager->createUser([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com'
        ]);
    }

    public function deleteUser()
    {
        $notificationService = new NotificationService();
        $loggerService = new LoggerService();

        $mediator = new UserMediator($notificationService, $loggerService);
        $userManager = new UserManager($mediator);

        $userManager->deleteUser();
    }
}
