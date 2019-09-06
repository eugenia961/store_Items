<?php

namespace App\Carts\Controller;

use App\Controller\ControllerBase;

use App\Carts\Services\CartSearch;

class CartUserController extends ControllerBase {

    public function indexAction() {

        $userData = $this->session->get("USER_DATA");
        $idUser = $userData["id"];
        $cartSearch = new CartSearch($this->di);

        $carts = $cartSearch->cartUser($idUser);

        $this->view->setVar("carts", $carts);
        $this->view->pick("cart/user/index");
    }

}
