<?php

namespace App\Controller;

use App\Items\Interfaces\ItemRepositoryInterface;

class IndexController extends ControllerBase {

    private $itemRepositoryInterface;

    public function onConstruct() {

        $this->itemRepositoryInterface = $this->di->get(ItemRepositoryInterface::class);
    }

    public function indexAction($page=0) {

      
        $itemsPages = $this->itemRepositoryInterface->itemsPaginator($page);
        if ($page == 0) {
            $page = 1;
        }

        $this->view->setVar('itemsPages', $itemsPages);
        $this->view->setVar('page', $page);
    }

}
