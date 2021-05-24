<?php

namespace App\Infra\Db\Eloquent\Repository;

use App\Adapter\UserAdapter;
use App\Entity\User\User;
use App\Entity\User\UserRepositoryInterface;
use App\Infra\Db\Eloquent\Models\User as UserModel;

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