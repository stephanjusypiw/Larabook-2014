<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;


class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;


    /**
     * Path to the presenter for a user
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';
    /**
     * The fields allowed for mass assignment
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];


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
	protected $hidden = array('password', 'remember_token');

    /**
     * Hash user password before saving to the database
     *
     * @param $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {

        $this->attributes['password'] = Hash::make($password);

    }
    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new static( compact('username', 'email', 'password') );

        $user->raise(new UserRegistered($user));

        return $user;
    }


    /**
     * A user has many statuses
     * @return mixed
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    /**
     * Determine is the given user is the same as the current one
     *
     * @param $user
     *
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user))
            return false;

        return $this->username == $user->username;
    }

}
