<?php

namespace learning\Zend\ServiceManager\Tests;

use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;

class ObjectCreatingTest extends TestCase
{

    public function testGetObject()
    {
        $serviceManager = new ServiceManager([
            'factories' => [
                \stdClass::class => InvokableFactory::class
            ]
        ]);

        $this->assertInstanceOf(\stdClass::class, $serviceManager->get(\stdClass::class));
    }

    public function testGetMethodReturnsSameObject()
    {
        $serviceManager = new ServiceManager([
            'factories' => [
                \stdClass::class => InvokableFactory::class
            ]
        ]);
        $this->assertSame(
            $serviceManager->get(\stdClass::class),
            $serviceManager->get(\stdClass::class)
        );
    }

    public function testBuildAndGetMethodsReturnNotSameObject()
    {
        $serviceManager = new ServiceManager([
            'factories' => [
                \stdClass::class => InvokableFactory::class
            ]
        ]);
        $this->assertNotSame(
            $serviceManager->get(\stdClass::class),
            $serviceManager->build(\stdClass::class)
        );
    }

}
