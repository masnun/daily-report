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

}