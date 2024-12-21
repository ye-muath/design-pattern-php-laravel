<?php

namespace App\Mediator;

interface MediatorInterface
{
    public function notify(object $sender, string $event): void;
}
