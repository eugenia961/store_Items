<?php

namespace App\Users\Forms;

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Email as Emailfield,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Confirmation,
    Phalcon\Validation\Validator\Alnum as AlnumValidator,
    Phalcon\Forms\Element\Text,
    Phalcon\Validation\Validator\Callback as CallbackValidator,
    Phalcon\Validation\Validator\Alpha as AlphaValidator;
use App\Users\Services\UserSearch;

class RegisterForm extends Form {

    private $user;

    public function initialize($user, array $options) {

        $this->user = $user;

        $email_options = array('placeholder' => 'Enter E-mail',
            'id' => 'email',
            'maxlength' => 100,
            'class' => 'form-control'
        );

        $email = new Emailfield('email'
                , $email_options
        );

        $email->setLabel('E-Mail');
        $email->setFilters('email');

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'E-mail is required'
                    )),
            new Email(array(
                'message' => 'E-mail is not valid'
                    )),
            new CallbackValidator(
                    [
                "message" => "E-mail is already in use",
                "callback" => function($dataForm) {

                    $userSearch = new UserSearch($this->di);
                    $userEmail = null;

                    $userEmail = $userSearch->findByEmail($dataForm['email']);

                    if ($this->user != null && $userEmail != null) {

                        return ($userEmail->id() == $this->user->id());
                    }

                    return ($userEmail == null);
                }
                    ]
            )
        ));

        $password = new Password('password', array(
            'placeholder' => 'Type your Password',
            'id' => 'password',
            'maxlength' => 50,
            'class' => 'form-control',
        ));
        $password->setLabel('Password');
        $password->setFilters(array('striptags', 'string'));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password required'
                    )),
            new AlnumValidator(array(
                'message' => 'Password must contain only alphanumeric characters'
                    ))
        ));

        $confirm_password = new Password('confirm_password', [
            'placeholder' => 'Confirm password', 'class' => 'form-control']
        );
        $confirm_password->setLabel('Confirm password');
        $confirm_password->addValidator(new Confirmation(
                array(
            'with' => 'password',
            'message' => "Password does not match confirmation."
        )));

        $name_options = array(
            'placeholder' => 'Type your name',
            'id' => 'name',
            'maxlength' => 50,
            'class' => 'form-control'
        );


        $name = new Text('name', $name_options);
        $name->setLabel('Name');
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Name required'
                    )),
            new AlphaValidator(
                    [
                "message" => "Name must contain only letters",
                    ]
            )
        ));

        $this->add($password);
        $this->add($email);
        $this->add($name);
        $this->add($confirm_password);
    }

}
