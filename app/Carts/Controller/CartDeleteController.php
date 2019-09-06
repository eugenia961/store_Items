<?php

namespace App\Carts\Controller;

use App\Controller\ControllerBase;
use App\Carts\Services\CartItem;

class CartDeleteController extends ControllerBase {


    public function indexAction($id)
    {

        $cartItems = $this->session->get("CART_ITEMS");
        $countCartItems = $this->session->get("CART_COUNT");

        $cartItem = new CartItem($this->di, $id, $cartItems, $countCartItems);
        list($items, $count) = $cartItem->deleteItemCart($id);

        $this->session->set("CART_ITEMS", []);
        $this->session->set("CART_ITEMS", $items);
        $this->session->set("CART_COUNT", $count);

        $this->view->setVar('cartItems', $count);
        $this->response->redirect("cart/show");

    }

}

