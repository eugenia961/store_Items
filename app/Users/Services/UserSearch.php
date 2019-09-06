<?php

namespace App\Users\Services;

use App\Users\Interfaces\UserRepositoryInterface;


class UserSearch {

    private $di;
    private $userRepositoryInterface;

    public function __construct($di) {

        $this->di = $di;
        $this->userRepositoryInterface = $this->di->get(UserRepositoryInterface::class);
    }

    public function findByEmail($email) {

        $user = $this->userRepositoryInterface->findByEmail($email);

        return $user;
    }

    public function findById($id) {

        $user = $this->userRepositoryInterface->findUserById($id);

        return $user;
    }

}
