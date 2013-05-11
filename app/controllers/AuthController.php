<?php

class AuthController extends BaseController
{

    public function getRegister()
    {
        $data = array();
        $data['username'] = null;
        $data['email'] = null;
        $data['name'] = null;
        return View::make('auth.register')->with($data);
    }

    public function postRegister()
    {
        $username = Input::get('username', null);
        $email = Input::get('email', null);
        $password = Input::get('password', null);
        $name = Input::get('name', null);

        $data = array();
        $data['username'] = $username;
        $data['email'] = $email;
        $data['name'] = $name;

        if (empty($username) || empty($email) || empty($password) || empty($name)) {

            $data['error'] = 'One or more fields were empty!';
            return View::make('auth.register')->with($data);
        } else {

            if (User::exists('username', $username)) {
                $data['error'] = 'The username is already taken!';
                return View::make('auth.register')->with($data);
            }

            if (User::exists('email', $email)) {
                $data['error'] = 'The email is already in use!';
                return View::make('auth.register')->with($data);
            }

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->name = $name;

            $user->save();

            return Redirect::to('/auth/login');
        }


    }

    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function postLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            return Redirect::to('/home/dashboard');
        } else {
            return "Login failed!";
        }
    }


}