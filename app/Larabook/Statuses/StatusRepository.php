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

//      return Status::all();
       return $user->statuses()
                   ->with('user')
                   ->latest()
                   ->get();

//        return $user->statuses()->get();
    }

    /**
     * Get the feed for a user
     *
     * @param User $user
     *
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::with('comments')->wherein('user_id', $userIds)->latest()->get();
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

    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($body, $statusId);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }

} 