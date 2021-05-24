<?php

use App\Controller\UserController;
use App\Entity\User\UserRepositoryInterface;
use App\Presenter\Json\UserListJson;
use App\UseCase\User\ListUser;
use Psr\Container\ContainerInterface;

return [

    UserController::class => function(ContainerInterface $c) {
        return new UserController(
            new ListUser(
                $c->get(UserRepositoryInterface::class),
                new UserListJson()
            )
        );
    },

];

