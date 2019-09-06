<?php

namespace App\Users\Services;

use App\Users\Interfaces\UserRepositoryInterface;
use App\Users\Models\Users;

final class UserUpdate {

    private $di;
    private $userRepositoryInterface;
    private $security;

    public function __construct($di) {

        $this->di = $di;
        $this->userRepositoryInterface = $this->di->get(UserRepositoryInterface::class);
        $this->security = $this->di->get("security");
    }

    public function __invoke(Users $user) {

        $password = $user->password();

        $user->setPassword($this->security->hash($password));

        $this->userRepositoryInterface->save($user);
    }

}
