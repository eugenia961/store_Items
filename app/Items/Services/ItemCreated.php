<?php

namespace App\Items\Services;

use App\Items\Interfaces\ItemRepositoryInterface;
use App\Items\Model\Items;

final class ItemCreated {

    private $di;
    private $itemRepositoryInterface;

    public function __construct($di) {

        $this->di = $di;
        $this->itemRepositoryInterface = $this->di->get(ItemRepositoryInterface::class);
    }

    public function __invoke($id, $name, $prices, $quantity, $description) {

        $item = new Items();
        $item->setId($id);
        $item->setItem($name);
        $item->setPrice($prices);
        $item->setQuantity($quantity);
        $item->setDescription($description);
        $item->setEnabled("1");
        $this->itemRepositoryInterface->save($item);
    }

}
