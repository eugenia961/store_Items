<?php

namespace App\Carts\Services;

use App\Carts\Interfaces\CartRepositoryInterface;
use App\Carts\Models\Carts;
use App\Carts\Models\CartsItems;

class CartSearch {

    private $di;
    private $cartRepositoryInterface;

    public function __construct($di) {

        $this->di = $di;
        $this->cartRepositoryInterface = $this->di->get(CartRepositoryInterface::class);
    }

    public function cartUser($idUser) {

        $carts = [];
        $cartsData = $this->cartRepositoryInterface->findCartByUser($idUser);
        if ($cartsData) {
            foreach ($cartsData as $cart) {

                $carts[$cart->id]['id'] = $cart->id;
                $carts[$cart->id]['creation'] = $cart->creation;
                $carts[$cart->id]['number'] = $carts[$cart->id]['number'] + 1;
                $carts[$cart->id]['price'] = $carts[$cart->id]['price'] + ($cart->ci->quantity() * $cart->ci->unitPrice());
                $carts[$cart->id]['items'][$cart->ci->itemId()]['item'] = $cart->i->item();
                $carts[$cart->id]['items'][$cart->ci->itemId()]['quantity'] = $cart->ci->quantity();
                $carts[$cart->id]['items'][$cart->ci->itemId()]['unit_price'] = $cart->ci->unitPrice();
                $carts[$cart->id]['itemsJson'] = \json_encode($carts[$cart->id]['items'], true);
            }
        }


        return $carts;
    }

}
