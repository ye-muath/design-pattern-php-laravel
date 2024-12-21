<?php

namespace App\Mediator;

use App\Models\User;

class UserManager
{
    private MediatorInterface $mediator;
    private ?User $user = null;

    public function __construct(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }

    public function createUser(array $data): void
    {
        // Simulating user creation
        $this->user = new User($data);
        $this->mediator->notify($this, 'user_created');
    }

    public function deleteUser(): void
    {
        if ($this->user) {
            $this->mediator->notify($this, 'user_deleted');
            $this->user = null;
        }
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
