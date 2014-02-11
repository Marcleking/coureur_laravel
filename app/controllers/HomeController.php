<?php

class HomeController extends BaseController {

	public function connexion()
	{
		return View::make('login');
	}

	public function connect()
	{
		$input = Input::only("email", "password");
		if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
		    return Redirect::intended('/');
		} else {
			return Redirect::back();
		}
	}

	public function disconnect()
	{
		Auth::logout();
		return Redirect::route('login');
	}

	public function user()
	{
		return View::make('hello');
	}

}