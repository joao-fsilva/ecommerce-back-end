<?php

use DI\ContainerBuilder;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/eloquent.php';

$builder = new ContainerBuilder();
$builder->useAnnotations(true);
$builder->addDefinitions(__DIR__ . '/config/di/repositories.php');
$builder->addDefinitions(__DIR__ . '/config/di/logger.php');

try {

    $container = $builder->build();

} catch (Exception $e) {
}
