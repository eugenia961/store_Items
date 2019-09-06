<?php

namespace App\Users\Controller;

use App\Controller\ControllerBase;

use App\Users\Forms\LoginForm;
use App\Users\Services\UserSearch;

class LoginController extends ControllerBase {

    public function indexAction() {

        $form = new LoginForm();

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

                $UserSearch = new UserSearch($this->di);
                $user = $UserSearch->findByEmail($this->request->get("email"));

                if ($user) {

                    if ($this->security->checkHash($this->request->get("password"), $user->password())) {

                        $this->session->set("USER_DATA", []);
                        $this->session->set("USER_DATA", [
                            'name' => $user->name(),
                            'id' => $user->id(),
                            'email' => $user->email()
                        ]);

                        $this->response->redirect("index");
                    } else {
                        $this->flashSession->error("User not found");
                    }
                } else {

                    $this->flashSession->error("User not found");
                }
            } else {

                foreach ($form->getMessages() as $message) {
                    $this->flashSession->error((string) $message);
                }
            }
        }

        $this->view->setVar("register", true);
        $this->view->setVar("form", $form);
        $this->view->pick("user/login/index");
    }

}
