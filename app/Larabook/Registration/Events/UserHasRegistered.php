<?php

namespace Larabook\Registration\Events;

use Larabook\Users\User;

/**
 * Class UserHasRegistered
 * @package Larabook\Registration\Events
 * @author Valentin PRUGNAUD <valentin@whatdafox.com>
 */
class UserHasRegistered {

    public $user;

    public function __construct(User $user )
    {
        $this->user = $user;
    }

}