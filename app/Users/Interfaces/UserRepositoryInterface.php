<?php

namespace App\Users\Interfaces;

use App\Users\Models\Users;

interface UserRepositoryInterface {

    public function save(Users $user);

    public function findByEmail($email);
    
    public function findUserById($id);

}
