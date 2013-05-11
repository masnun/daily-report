<?php

class HomeController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getDashboard()
    {
        $data = array();
        $data['user'] = Auth::user();
        $data['name'] = null;
        $data['error'] = null;

        return View::make('home.dashboard')->with($data);
    }

    public function postDashboard()
    {
        $name = Input::get('name', null);
        $user = Auth::user();

        if(! Team::exists($name, $user)) {
            $team = new Team();
            $team->name = $name;
            $team->owner_id = $user->id;

            $team->save();

            return Redirect::to('/home/dashboard');
        } else {
            $data = array();
            $data['user'] = Auth::user();
            $data['name'] = $name;
            $data['error'] = 'You already have a team with that name!';

            return View::make('home.dashboard')->with($data);
        }

    }

}