<?php

namespace App\Adapter;

use App\Entity\User\User;

class UserAdapter
{
    public static function create(int $id, string $name): User
    {
        $user = new User($name);

        $user->setId($id);

        return $user;
    }
}