<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository {



    public function getAll($userId)
    {
        //passing the userID from the controller
        return User::find($userId)->statuses;
    }
    /**
     * Get user statuses
     * @param User $user
     * @return mixed
     */
    public function getAllForUser(User $user)
    {
       return $user->statuses()->with('user')->latest()->get();

//        return $user->statuses;
    }
    /**
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }

} 