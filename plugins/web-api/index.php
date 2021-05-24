<?php

use DI\Bridge\Slim\Bridge;

require_once __DIR__ . '/../../bootstrap.php';

/** @var $container \DI\Container */

$app = Bridge::create($container);

require_once __DIR__ . '/routes.php';

$app->run();