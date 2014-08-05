<?php

namespace Larabook\Users;


class UserRepository {

    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user){

        return $user->save();
    }

    /**
     * Returns a paginated list of users
     *
     * @param int $limit
     * @return mixed
     */
    public function getPaginated($limit = 25)
    {
        return User::orderBy('username','asc')->paginate($limit);
    }

    /**
     * Fetch a user by their username
     *
     * @param $username
     *
     * @return mixed
     */
    public function findByUsername($username)
    {
          return User::with([ 'statuses' => function($query)
              {
                  $query->latest();
              }])->whereUsername($username)->first();
      //  return User::whereUsername($username)->first();
    }

    /**
     * Find a user by their id
     *
     * @param $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a larabook user
     *
     * @param      $userIdToFollow
     * @param User $user
     *
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->follows()->attach($userIdToFollow);
    }


} 