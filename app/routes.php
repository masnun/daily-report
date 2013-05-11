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
    $user = User::find(1);

    $report = new Report();
    $report->title = 'ok done';
    $report->team_id = $team->id;
    $report->user_id = $user->id;

    $report->save(); */

    //$report = Report::find(1);
    //var_dump($report->reporter);


    //var_dump(User::exists('username', 'masnun22'));

    return View::make('home.index');
});

// RESTful Controllers
Route::controller('auth','AuthController');
Route::controller('home','HomeController');


// Single Team
Route::model('team','Team');
Route::get('/team/{team}','TeamController@getTeam');