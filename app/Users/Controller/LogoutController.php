<?php

namespace App\Users\Controller;

use App\Controller\ControllerBase;

class LogoutController extends ControllerBase {

    public function indexAction() {

        $this->session->destroy();
        session_unset();
        $this->response->redirect("index");
    }

}
