<?php

namespace App\Items\Repository;

use App\Items\Interfaces\ItemRepositoryInterface;
use App\Items\Model\Items;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class ItemRepository implements ItemRepositoryInterface {

    public function save(Items $item) {

        $item->save();
    }

    public function findAllItems() {


        $items = Items::query()
                ->where('enabled = :enabled:')
                ->bind(['enabled' => '1'])
                ->orderBy("item ASC")
                ->execute();

        return $items;
    }

    public function itemsPaginator(int $page = 0) {

        $items = Items::query()
                ->where('enabled = :enabled:')
                ->andWhere("quantity<>0")
                ->bind(['enabled' => '1'])
                ->orderBy("item ASC")
                ->execute();

        $paginator = new PaginatorModel(
                [
            'data' => $items,
            'limit' => 6,
            'page' => $page,
                ]
        );

        $pageItems = $paginator->getPaginate();

        return $pageItems;
    }

    public function findItemById($id) {

        $item = Items::findFirst(
                        [
                            'enabled' => '1',
                            "conditions" => "id = :id:",
                            "bind" => [
                                "id" => $id
                            ],
                        ]
        );

        return $item;
    }

}
