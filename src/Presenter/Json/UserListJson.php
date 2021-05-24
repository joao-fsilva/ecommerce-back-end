<?php

namespace App\Presenter\Json;

use App\Presenter\PresenterInterface;

class UserListJson implements PresenterInterface
{
    public function present(array $data): string
    {
        $users = [];

        foreach ($data as $user) {
            $users[] = [
                'id' => $user->getId(),
                'name' => $user->getName()
            ];
        }

        return json_encode($users, JSON_UNESCAPED_UNICODE);
    }
}