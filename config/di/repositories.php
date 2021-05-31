<?php

use Ecommerce\Entity\User\UserRepositoryInterface;
use Ecommerce\Infra\Db\Repository\UserRepository;
use Psr\Container\ContainerInterface;

return [

    UserRepositoryInterface::class => function(ContainerInterface $c) {
        return new UserRepository();
    },

];

