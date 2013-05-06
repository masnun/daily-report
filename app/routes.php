<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    /*
	$user = new User();
    $user->password = Hash::make('masnun');
    $user->email ="a@2.org";
    $user->username = 'masnun2';
    $user->name = 'Masnun';

    $user->save(); */

    /*
    $team = new Team();
    $team->name = "OK";
    $team->owner_id = 1;
    $team->save(); */

    /*
    $team = Team::find(1);
    $team->members()->attach($user); */

    $user = User::find(1);

    var_dump($user->teams[0]);


    return '';
});