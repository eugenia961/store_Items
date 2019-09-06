<?php

namespace App\Users\Repository;

use App\Users\Interfaces\UserRepositoryInterface;
use App\Users\Models\Users;

class UserRepository implements UserRepositoryInterface {

    public function findByEmail($email) {

        $user = Users::findFirst(
                        [
                            'enabled' => '1',
                            "conditions" => "email = :email:",
                            "bind" => [
                                "email" => $email
                            ],
                        ]
        );

        return $user;
    }

    public function findUserById($id) {
        $user = Users::findFirst(
                        [
                            'enabled' => '1',
                            "conditions" => "id = :id:",
                            "bind" => [
                                "id" => $id
                            ],
                        ]
        );


        return $user;
    }

    public function save(Users $user) {
        $user->save();
    }


}
