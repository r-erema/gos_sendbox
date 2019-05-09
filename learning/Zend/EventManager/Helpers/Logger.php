<?php

namespace learning\Zend\EventManager\Helpers;

use Zend\Log\Logger as ZendLogger;
use Zend\Log\Writer\Stream;

trait Logger
{

    /**
     * @var string
     */
    private $logFilePath;

    /**
     * @var ZendLogger
     */
    private $logger;

    /**
     * @throws \ReflectionException
     */
    private function initLogger()
    {
        $calledClassName = get_called_class();
        $classFileName = (new \ReflectionClass($calledClassName))->getFileName();
        $this->logFilePath = dirname($classFileName) . '/test.log';
        $this->logger = new ZendLogger();
        $this->logger->addWriter(new Stream($this->logFilePath));
    }

    /**
     * @return bool|string
     */
    private function readLog()
    {
        return file_get_contents($this->logFilePath);
    }

    private function destroyLogFile()
    {
        unlink($this->logFilePath);
    }
}
