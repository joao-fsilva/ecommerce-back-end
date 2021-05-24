<?php

use App\Command\User\UserListCommand;
use App\Entity\User\UserRepositoryInterface;
use App\Presenter\TextPlain\UserListTextPlain;
use App\UseCase\User\ListUser;
use Psr\Container\ContainerInterface;

return [

    UserListCommand::class => function(ContainerInterface $c) {
        return new UserListCommand(
            new ListUser(
                $c->get(UserRepositoryInterface::class),
                new UserListTextPlain()
            )
        );
    },

];

