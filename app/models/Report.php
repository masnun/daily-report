<?php

class Report extends Eloquent
{

    protected $table = 'reports';

    public function team()
    {
        return $this->belongsTo('Team', 'team_id');
    }

    public function reporter()
    {
        return $this->belongsTo('User', 'user_id');
    }

}