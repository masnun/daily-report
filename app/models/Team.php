<?php

class Team extends Eloquent
{

    protected $table = 'teams';

    /**
     * Get the owner
     * @return User
     */
    public function owner()
    {
        return $this->belongsTo('User', 'owner_id');
    }

    public function members()
    {
        return $this->belongsToMany('User', 'teams_users', 'team_id', 'user_id');
    }

    public function reports()
    {
        return $this->hasMany('Report', 'team_id');
    }

}