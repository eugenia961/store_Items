<?php

namespace App\Items\Interfaces;

use App\Items\Model\Items;

interface ItemRepositoryInterface {

    public function save(Items $item);

    public function findAllItems();

    public function itemsPaginator(int $page = 0);

    public function findItemById($id);
}
