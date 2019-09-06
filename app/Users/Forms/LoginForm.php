<?php

namespace App\Users\Forms;

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Email as Emailfield,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Alnum as AlnumValidator;

class LoginForm extends Form {

    public function initialize() {


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
                    ))
        ));

        $password = new Password('password', array(
            'placeholder' => 'Type your Password',
            'id' => 'password',
            'maxlength' => 50,
            'class' => 'form-control'
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

        $this->add($password);
        $this->add($email);
    }

}
