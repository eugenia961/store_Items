<?php

namespace App\Carts\Repository;

use App\Carts\Interfaces\CartRepositoryInterface;
use App\Carts\Models\Carts;
use App\Carts\Models\CartsItems;

final class CartRepository implements CartRepositoryInterface {

    public function findCartByUser($userId) {

        $carts = Carts::query()
                ->join("App\Carts\Models\CartsItems", 'App\Carts\Models\Carts.id = ci.cart_id', 'ci')
                ->join("App\Items\Model\Items", 'i.id = ci.item_id', 'i')
                ->where('App\Carts\Models\Carts.user_id = :userId:', [
                    'userId' => $userId
                        ]
                )
                ->columns(
                        [
                            'App\Carts\Models\Carts.id',
                            'App\Carts\Models\Carts.user_id',
                            'App\Carts\Models\Carts.creation',
                            'ci.*',
                            'i.*'
                        ]
                )
                ->orderBy('App\Carts\Models\Carts.creation DESC')
                ->execute();

        return $carts;
    }

    public function save(Carts $cart) {
        $cart->save();
    }

    public function saveItem(CartsItems $cartsItems) {
        $cartsItems->save();
    }

}
