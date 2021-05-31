<?php

namespace Ecommerce\Adapter;

use Ecommerce\Entity\User\User;

class UserAdapter
{
    public static function create(int $id, string $name, string $email, string $cpf): User
    {
        $user = User::createWithNameEmailCpf($name, $email, $cpf);

        $user->setId($id);

        return $user;
    }
}