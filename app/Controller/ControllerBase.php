<?php

namespace App\Controller;

use Phalcon\Mvc\Controller;
use App\Services\ValidateSessionService;

class ControllerBase extends Controller {

    public function initialize() {


        // Add some local CSS resources

        $this->assets->addCss("twitter/bootstrap/dist/css/bootstrap.min.css");
        $this->assets->addCss("css/plugin.css");
        $this->assets->addCss("css/style.css");
        $this->assets->addJs("js/jquery.number.js");
        
        

        $cartItems = 0;
        if ($this->session->has("CART_COUNT")) {            
            $cartItems = $this->session->get("CART_COUNT");
        }
        
        $name = "";
        $idUser=0;
        $isLogin = $this->session->has("USER_DATA");
        if ($isLogin) {
            $userData = $this->session->get("USER_DATA");
            $name = $userData["name"];
            $idUser=$userData["id"];
        }

        $this->view->setVar('isLogin', $isLogin);
        $this->view->setVar('name', $name);
        $this->view->setVar('idUser', $idUser);
        $this->view->setVar('cartItems', $cartItems);
        $this->view->setVar("register", false);
    }

}
