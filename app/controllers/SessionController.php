<?php

class SessionController extends \BaseController {

	// login
	public function create()
	{	
		if(Auth::check()) return Redirect::to('/posts');
		return View::make('sessions.create');
	}

	// validation
	public function store()
	{	
		$validation = Validator::make(Input::all(), ['email' => 'required', 'password' => 'required']);

		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		if(Auth::attempt(Input::only('email', 'password')))
		{
			// if correct
			return Redirect::to('/posts');
			// return Auth::user() ;
		}
		return 'Failed!';
	}

	// logout

	public function destroy()
	{
		Auth::logout();

		return Redirect::route('session.create');
	}

}