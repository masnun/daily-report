<?php

class TeamController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getTeam(Team $team)
    {
        if (Team::isMember(Auth::user(), $team)) {
            $data = array();
            $data['team'] = $team;
            $data['reports'] = Report::today($team->id);
            $data['error'] = null;
            return View::make('team.dashboard')->with($data);
        } else {
            return "You don't have permission to view this team!";
        }
    }

    public function addMember()
    {
        $email = Input::get('email', null);
        $teamId = Input::get('team_id', null);
        $team = Team::find($teamId);

        if (Team::isMember(Auth::user(), $team)) {
            $user = User::findByEmail($email);
            if ($user) {
                if (!Team::isMember($user, $team)) {
                    $team->members()->attach($user);
                    $team->save();
                    return Redirect::to("/team/{$teamId}");
                } else {
                    return "The user is already a member!";
                }
            } else {
                return "The user doesn't exist!";
            }
        } else {
            return "You don't have permission to view this team!";
        }
    }

}