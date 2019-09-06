<?php

namespace App\Carts\Services;

use App\Carts\Interfaces\CartRepositoryInterface;
use App\Carts\Models\Carts;
use App\Carts\Models\CartsItems;

final class CartCreated {

    private $di;
    private $cartRepositoryInterface;

    public function __construct($di) {

        $this->di = $di;
        $this->cartRepositoryInterface = $this->di->get(CartRepositoryInterface::class);
    }

    public function __invoke($id, $userId, $items) {

        $carts = new Carts();
        $carts->setId($id);
        $carts->setUserId($userId);
        $carts->setCreation(date("Y-m-d H:i:s"));
        $this->cartRepositoryInterface->save($carts);

        foreach ($items as $itemId => $item) {

            $cartsItems = new CartsItems();
            $cartsItems->setCartId($id);
            $cartsItems->setItemId($itemId);
            $cartsItems->setQuantity($item['quantity']);
            $cartsItems->setUnitPrice($item['unitPrice']);

            $this->cartRepositoryInterface->saveItem($cartsItems);
        }
    }

}
