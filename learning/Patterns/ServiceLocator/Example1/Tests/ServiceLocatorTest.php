<?php

namespace learning\Patterns\DependencyInjection\Example1\Tests;

use learning\Patterns\DependencyInjection\Example1\DatabaseConfiguration;
use learning\Patterns\DependencyInjection\Example1\DatabaseConnection;
use learning\Patterns\ServiceLocator\Example1\LogService;
use learning\Patterns\ServiceLocator\Example1\ServiceLocator;
use PHPUnit\Framework\TestCase;

class ServiceLocatorTest extends TestCase
{

    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    public function setUp()
    {
        $this->serviceLocator = new ServiceLocator();
    }

    public function testHasServices()
    {
        $this->serviceLocator->addInstance(LogService::class, new LogService());
        $this->assertTrue($this->serviceLocator->has(LogService::class));
        $this->assertFalse($this->serviceLocator->has(self::class));
    }

    public function testGetWillInstantiateLogServiceIfNoInstanceHasBeenCreatedYet()
    {
        $this->serviceLocator->addClass(LogService::class, []);
        $logger = $this->serviceLocator->get(LogService::class);
        $this->assertInstanceOf(LogService::class, $logger);
    }
}
