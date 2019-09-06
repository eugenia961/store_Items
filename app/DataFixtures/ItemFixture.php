<?php

namespace App\DataFixtures;

use Phalcon\Security\Random;
use App\Items\Services\ItemCreated;

final class ItemFixture {

    private $di;

    public function __construct($di) {

        $this->di = $di;
    }

    public function __invoke() {

        $random = new Random();
        $itemCreated = new ItemCreated($this->di);

        for ($i = 0; $i < 50; $i++) {

            $id = $random->uuid();
            $prices = (1.25 * $i);
            $itemCreated($id, "Item - $i", $prices, $i, "Item - $i");
        }
    }

}
