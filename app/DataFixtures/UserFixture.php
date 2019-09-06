<?php

namespace App\DataFixtures;

use Phalcon\Security\Random;
use App\Users\Services\UserCreated;

final class UserFixture {

    private $di;

    public function __construct($di) {

        $this->di = $di;
    }

    public function __invoke() {

        $random = new Random();
        $UserCreated = new UserCreated($this->di);

        $id = $random->uuid();
        $UserCreated($id, "Admin", "admin", "admin@admin.com");

        $id = $random->uuid();
        $UserCreated($id, "Admin 2", "admin2", "admin2@admin.com");
        
    }

}
