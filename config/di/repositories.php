<?php

use App\Entity\User\UserRepositoryInterface;
use App\Infra\Db\Eloquent\Repository\UserRepository;
use Psr\Container\ContainerInterface;

return [

    UserRepositoryInterface::class => function(ContainerInterface $c) {
        return new UserRepository();
    },

];

