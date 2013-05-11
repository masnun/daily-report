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

    // Scopes
    public static function today($teamId)
    {
        $today = date('Y-m-d');
        return static::where('created_at','>',"{$today} 00:00:00")
        ->where('created_at','<',"{$today} 23:59:59")
        ->where('team_id','=',$teamId)
        ->get();
    }

}