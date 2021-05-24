<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return [

    LoggerInterface::class => function(ContainerInterface $c) {

        $logger = new Logger('ecommerce');

        if (!LOGGER['on']) {
            $logger->pushHandler(new NullHandler());
            return $logger;
        }

        $lineFormatter = new LineFormatter(null, 'Y-m-d H:i:s.u', false, true);

        if (!empty(LOGGER['file'])) {
            $streamHandler = new StreamHandler(LOGGER['file'], Logger::INFO);
            $streamHandler->setFormatter($lineFormatter);

            $logger->pushHandler($streamHandler);
        }

        if (LOGGER['stdout']) {
            $streamHandler = new StreamHandler('php://stdout', Logger::INFO);
            $streamHandler->setFormatter($lineFormatter);

            $logger->pushHandler($streamHandler);
        }

        return $logger;
    }
];

