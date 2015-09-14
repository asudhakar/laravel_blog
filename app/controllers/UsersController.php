<?php

class UsersController extends \BaseController {

	public function main()
	{
		if(Auth::check())
		{
			return Redirect::to('/posts');
		}

		return View::make('users.main');
		
	}

	public function index()
	{
		$users = User::all();
		return View::make('users.index', ['users' => $users]);

	}


	public function show($id)
	{
			$user = User::whereId($id)->first(); //select * from users where username="USERNAME" limit 1

			return View::make('users.show', ['user' => $user]);
	}


	public function create()
	{
			return View::make('users.create');
	}

	public function store()
	{

		// return Input::all();  To check whether all the data come or not.


		//validation
		$validation = Validator::make(Input::all(), ['username' => 'required', 'email' => 'required|unique:users,email', 'password' => 'required']);

		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}


		//storing the value.
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->created_at = Carbon\Carbon::now();
		$user->updated_at = Carbon\Carbon::now();
		$user->save();

		//redirecting back to users page
		return Redirect::to('/');

	}


}
