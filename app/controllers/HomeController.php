<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function getDashboard()
	{
		$data = array();
		$data['user'] = Auth::user();
		$data['title'] = null;

		return View::make('home.dashboard')->with($data);
	}

	public function postDashboard()
	{
		$title = Input::get('title');

	}

}