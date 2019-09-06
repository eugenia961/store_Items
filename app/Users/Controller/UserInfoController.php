<?php

namespace App\Users\Controller;

use App\Controller\ControllerBase;

use App\Users\Forms\RegisterForm;
use App\Users\Services\UserSearch;
use App\Users\Services\UserUpdate;

class UserInfoController extends ControllerBase {

    public function indexAction($id) {

        $userSearch = new UserSearch($this->di);
        $user = $userSearch->findById($id);
        if ($user) {
            $user->setPassword("");
        }
        $form = new RegisterForm($user, ['edit' => true]);

        if ($this->request->isPost() && $user) {


            if ($form->isValid($this->request->getPost()) != false) {

                $userUpdate = new UserUpdate($this->di);
                $userUpdate($user);
                $this->session->set("USER_DATA", []);
                $this->session->set("USER_DATA", [
                    'name' => $user->name(),
                    'id' => $user->id(),
                    'email' => $user->email()
                ]);

                $this->response->redirect("user/info/$id");
                
            } else {

                foreach ($form->getMessages() as $message) {
                    $this->flashSession->error((string) $message);
                }
            }
        }


        $this->view->setVar("form", $form);
        $this->view->pick("user/info/index");
    }

}
