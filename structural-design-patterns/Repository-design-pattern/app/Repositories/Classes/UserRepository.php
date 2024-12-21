<?php
namespace App\Repositories\Classes;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
	public function getAll(){
		return User::all();
	}

	public function getUser($id){
		return User::find($id);
	}
}
