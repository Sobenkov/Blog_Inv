<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entities\User;


class UsersController extends Controller
{
	public function index()
	{
		$users = (new User())->get();
		$params=[
			'users' => $users
		];
		return view('admin.users.index', $params);
	}
}