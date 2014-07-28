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
        return User::simplePaginate($limit);
    }

} 