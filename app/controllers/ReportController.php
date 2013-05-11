<?php

class ReportController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function postAdd()
    {
        $title = Input::get('title', null);
        $team_id = Input::get('team_id', null);
        $user = Auth::user();

        if (Team::isMember($user, $team_id)) {
            $report = new Report();
            $report->title = $title;
            $report->team_id = $team_id;
            $report->user_id = $user->id;

            $report->save();

            return Redirect::to("/team/{$team_id}");
        } else {
            return "You don't have permission to add report to this team!";
        }

    }
}