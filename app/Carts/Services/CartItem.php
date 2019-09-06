<?php

namespace App\Carts\Services;

use App\Items\Services\ItemFind;

class CartItem {

    private $di;
    private $session;
    private $itemId;
    private $items;
    private $count;

    public function __construct($di, $itemId, $items, $count) {

        $this->di = $di;
        $this->session = $this->di->get("session");
        $this->itemId = $itemId;
        $this->items = $items;
        $this->count = $count;
    }

    private function item() {

        $itemFind = new ItemFind($this->di);
        $item = $itemFind($this->itemId);

        return $item;
    }

    private function addCountItem() {

        $countItems = $this->count;
        $countItems++;

        return $countItems;
    }

    private function deleteCountItem($quantity) {

        $countItems = $this->count - $quantity;

        return $countItems;
    }

    public function deleteItemCart($id) {

        $item = $this->item();
        $itemsDelete = $this->items;
        $countItems = $this->count;
        if ($item) {
            $countItems = $this->deleteCountItem($itemsDelete[$item->Id()]['quantity']);
            unset($itemsDelete[$id]);
        }

        return [$itemsDelete, $countItems];
    }

    public function addItemCart() {

        $item = $this->item();
        $itemsAdd = $this->items;
        $countItems = $this->count;

        if ($item != null) {
            $countItems = $this->addCountItem();
            $quantity = $itemsAdd[$item->Id()]['quantity'] + 1;
            $itemsAdd[$item->Id()]['id'] = $item->Id();
            $itemsAdd[$item->Id()]['item'] = $item->item();
            $itemsAdd[$item->Id()]['quantity'] = $quantity;
            $itemsAdd[$item->Id()]['price'] = $item->price() * $quantity;
            $itemsAdd[$item->Id()]['unitPrice'] = $item->price();
        }

        return [$itemsAdd, $countItems];
    }

}
