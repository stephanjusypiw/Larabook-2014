<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Present a link to the user gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

      //  return "//gravatar.com/avatar/{$email}?s={$size}";
        // code from ian simmons
        return "//www.gravatar.com/avatar/{$email}?s={$size}&d=//placekitten.com/{$size}/{$size}";
    }

}