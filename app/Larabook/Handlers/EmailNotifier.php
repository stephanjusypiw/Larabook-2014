<?php namespace Larabook\Handlers;

use Laracasts\Commander\Events\EventListener;
use Larabook\Registration\Events\UserHasRegistered;
use Larabook\Mailers\UserMailer;

class EmailNotifier extends EventListener{



    protected $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }
    public function whenUserHasRegistered(UserHasRegistered $event)
    {
         $this->mailer->sendWelcomeMessageTo($event->user);
    }
} 