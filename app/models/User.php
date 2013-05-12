<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the teams owned by the user
     *
     */
    public function teams()
    {
        return $this->hasMany('Team', 'owner_id');
    }

    public function members_to()
    {
        return $this->belongsToMany('Team', "teams_users", "user_id", "team_id");
    }

    public function reports()
    {
        return $this->hasMany('Report', 'user_id');
    }


    public static function exists($key, $value)
    {
        $data = static::where($key, '=', $value)->get();
        return (bool)count($data);
    }

    public static function findByEmail($email)
    {
        $data = static::where('email', '=', $email)->get();
        if (count($data)) {
            return $data[0];
        } else {
            return FALSE;
        }
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}