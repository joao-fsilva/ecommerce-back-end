<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$config = getenv('TEST_DEV') ? DB_CONNECTION_TESTS : DB_CONNECTION;

$capsule = new Capsule();

$capsule->addConnection($config);
$capsule->setEventDispatcher(new Dispatcher(new Container()));
$capsule->setAsGlobal();
$capsule->bootEloquent();