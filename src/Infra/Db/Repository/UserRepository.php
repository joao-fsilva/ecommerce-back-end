<?php

namespace Ecommerce\Infra\Db\Repository;

use Ecommerce\Adapter\UserAdapter;
use Ecommerce\Entity\User\User;
use Ecommerce\Entity\User\UserRepositoryInterface;
use Ecommerce\Infra\Db\Models\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function updateOrCreate(User $user): User
    {
        $userModel = UserModel::updateOrCreate([$user->getId()], [
            $user->getName(),
        ]);

        return UserAdapter::create($userModel->id, $userModel->name);
    }

    public function getAll(): array
    {
        $users = [];

        UserModel::all()->each(function (UserModel $user) use (&$users) {
            $users[] = UserAdapter::create($user->id, $user->name);
        });

        return $users;
    }
}