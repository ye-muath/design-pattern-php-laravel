<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
	private $repository;

	public function __construct(UserRepositoryInterface $repository)
	{
	   $this->repository = $repository;
	}

	public function index(){
        $data = $this->repository->getAll();
		return view('users')->with('data', $data);
	}

	public function show($id){
		$data = $this->repository->getUser($id);
		return view('user')->with('data', $data);
	}
}
