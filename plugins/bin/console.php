<?php

require_once __DIR__ . '/../../bootstrap.php';

use Ecommerce\Command\User\UserListCommand;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Console\Application;

$app = new Application('Ecommerce');

try {

    /** @var $container \DI\Container */

    $app->add($container->get(UserListCommand::class));

    $app->run();

} catch (DependencyException | NotFoundException | Exception $e) {
    var_dump($e->getMessage());
}