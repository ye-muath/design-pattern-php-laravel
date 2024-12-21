<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersWithFilters(array $filters)
    {
        $query = $this->userRepository->all();

        if (!empty($filters['email'])) {
            $query = $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        if (!empty($filters['created_at'])) {
            $query = $query->whereDate('created_at', '=', $filters['created_at']);
        }

        return $query->get();
    }
}
