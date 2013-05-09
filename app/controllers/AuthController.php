<?php

class AuthController extends BaseController {

    public function getRegister()
    {
        return View::make('auth.register');
    }

    public function postRegister()
    {
        $username = Input::get('username', null);
        $email = Input::get('email', null);
        $password = Input::get('password', null);

        if(empty($username) || empty($email) || empty($password))
        {
            $data = array();
            $data['error'] = 'One or more fields were empty!';
            $data['username'] = $username;
            $data['email'] = $email;

            return View::make('auth.register')->with($data);
        }
        else
        {

            if(User::exists('username', $username))
            {
                return View::make('auth.register')->with('error','The username is already taken!');
            }

            if(User::exists('email', $email))
            {
                return View::make('auth.register')->with('error','The username is already taken!');
            }

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make($password);

            $user->save();

            return Redirect::to('/auth/login');
        }


    }

}