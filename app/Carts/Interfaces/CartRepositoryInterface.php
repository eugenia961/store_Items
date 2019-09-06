<?php

namespace App\Carts\Interfaces;
use App\Carts\Models\Carts;
use App\Carts\Models\CartsItems;

interface CartRepositoryInterface {

    public function save(Carts $cart);

    public function findCartByUser($userId);
    
    public function saveItem(CartsItems $cartsItems);
}
