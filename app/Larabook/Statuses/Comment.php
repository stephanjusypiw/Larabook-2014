<?php namespace Larabook\Statuses;


class Comment extends \Eloquent {

    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * A comment belongs top a user.
     * @return type
     */
    public function owner()
    {
        // need to specify user id as second argument since it would
        // default to owner_id
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

    public static function leave($body, $statusId)
    {
        return new static([
            'body' => $body,
            'status_id' => $statusId
        ]);
    }

}