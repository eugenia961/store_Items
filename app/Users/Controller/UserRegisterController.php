<?php

namespace App\Users\Controller;

use App\Controller\ControllerBase;

use Phalcon\Security\Random;
use App\Users\Forms\RegisterForm;
use App\Users\Services\UserCreated;

class UserRegisterController extends ControllerBase {

    public function indexAction() {

        $form = new RegisterForm(null, ['edit' => false]);

        if ($this->request->isPost()) {


            if ($form->isValid($this->request->getPost()) != false) {

                $random = new Random();
                $id = $random->uuid();
                $UserCreated = new UserCreated($this->di);
                $UserCreated($id, $this->request->get('name'), $this->request->get('password'), $this->request->get('email'));
                $this->flashSession->success('Registered successfully!');
            } else {


                foreach ($form->getMessages() as $message) {
                    $this->flashSession->error((string) $message);
                }
            }
        }

        $this->view->setVar("register", true);
        $this->view->setVar("form", $form);
        $this->view->pick("user/register/index");
    }

}
