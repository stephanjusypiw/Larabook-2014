<?php


use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends \BaseController {

    use CommandBus;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;


    /**
     * Constructor
     * @param RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }


    /**
     * Show a form to register the user
     * @return Response
     */
    public function create()
    {
        return View::make('registration.create');
    }

    /**
     * Create a new Larabook user
     * @return string
     */
    public function store()
    {

        // validate form
        $this->registrationForm->validate(Input::all());

        // only get these fields
        extract(Input::only('username', 'email', 'password'));

        $user = $this->execute(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        return Redirect::home();
    }


}
