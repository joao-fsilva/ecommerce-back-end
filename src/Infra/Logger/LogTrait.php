<?php

namespace Ecommerce\Infra\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

trait LogTrait
{
    use LoggerTrait;

    /**
     * @Inject
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    public function log($level, $message, array $context = array())
    {
        $this->logger->log($level, $message, $context);
    }
}