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

    public static function exists($name, $user)
    {
        if ($user instanceof User) {
            $userId = $user->id;
        } else {
            $userId = $user;
        }

        $data = static::where('name', '=', $name)->where('owner_id', '=', $userId)->get();
        return (bool)count($data);
    }

    public static function isMember($user, $team)
    {
        if ($user instanceof User) {
            $userId = $user->id;
        } else {
            $userId = $user;
        }

        if (!$team instanceof Team) {
            $team = Team::find($team);
        }

        $members = array();
        foreach ($team->members as $member) {
            $members[] = $member->id;
        }

        return $team->owner_id == $userId || in_array($userId, $members);
    }

    public static function isOwner($user, $team)
    {
        if ($user instanceof User) {
            $userId = $user->id;
        } else {
            $userId = $user;
        }

        if (!$team instanceof Team) {
            $team = Team::find($team);
        }

        return $team->owner_id == $userId;
    }


}