<?php

namespace App\Users\Services;

use App\Users\Interfaces\UserRepositoryInterface;
use App\Users\Models\Users;

final class UserCreated {

    private $di;
    private $userRepositoryInterface;
    private $security;

    public function __construct($di) {

        $this->di = $di;
        $this->userRepositoryInterface = $this->di->get(UserRepositoryInterface::class);
        $this->security = $this->di->get("security");
    }

    public function __invoke($id, $name, $password, $email) {

        $user = new Users();

        $user->setId($id);
        $user->setName($name);
        $user->setPassword($this->security->hash($password));
        $user->setEmail($email);
        $user->setEnabled('1');
        
        $this->userRepositoryInterface->save($user);
    }

}
