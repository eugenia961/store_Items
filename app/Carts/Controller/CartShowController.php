<?php

namespace App\Carts\Controller;

use App\Controller\ControllerBase;
use App\Carts\Services\CartCreated;
use Phalcon\Security\Random;

class CartShowController extends ControllerBase {

    public function indexAction() {

        $items = [];
        if ($this->session->has("CART_ITEMS")) {

            $items = $this->session->get("CART_ITEMS");

            if ($this->request->isPost()) {

                $userData = $this->session->get("USER_DATA");
                $random = new Random();
                $cartCreated = new CartCreated($this->di);
                $id = $random->uuid();
                $cartCreated($id, $userData['id'], $items);
                $this->session->set("CART_ITEMS", []);
                $this->session->set("CART_COUNT", 0);
                $this->response->redirect("cart/user");
            }
        }


        $this->view->setVar("items", $items);
        $this->view->pick("cart/show/index");
    }

}
