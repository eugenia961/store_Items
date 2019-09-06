<?php

namespace App\Items\Services;

use App\Items\Interfaces\ItemRepositoryInterface;


final class ItemFind {

    private $di;
    private $itemRepositoryInterface;

    public function __construct($di) {

        $this->di = $di;
        $this->itemRepositoryInterface = $this->di->get(ItemRepositoryInterface::class);
    }

    public function __invoke($id) {

        $item = $this->itemRepositoryInterface->findItemById($id);

        return $item;
    }

}
