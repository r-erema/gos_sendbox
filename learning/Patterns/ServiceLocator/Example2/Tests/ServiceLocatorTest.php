<?php

namespace learning\Patterns\ServiceLocator\Example2\Tests;

use learning\Patterns\ServiceLocator\Example2\FileStorage;
use learning\Patterns\ServiceLocator\Example2\Serializer;
use learning\Patterns\ServiceLocator\Example2\ServiceLocator;
use PHPUnit\Framework\TestCase;

class ServiceLocatorTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testServiceLocator()
    {
        $locator = new ServiceLocator();
        $locator->set('serializer', new Serializer());
        $fileStorage = new FileStorage($locator);
        $fileStorage->write('This is a sample string');
        $this->assertEquals('This is a sample string', $fileStorage->read());
    }
}
