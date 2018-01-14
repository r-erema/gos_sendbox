<?php

namespace learning\Zend\ServiceManager\PluginManagers\Tests;

use learning\Zend\ServiceManager\PluginManagers\Foo;
use learning\Zend\ServiceManager\PluginManagers\ValidatorPluginManager;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;

class PluginManagersTest extends TestCase
{

    public function testPluginManagers()
    {
        $serviceManager = new ServiceManager([
            'factories' => [
                ValidatorPluginManager::class => function(ContainerInterface $container, string $requestedName) {
                    return new ValidatorPluginManager($container, [
                        'factories' => [
                            Foo::class => InvokableFactory::class
                        ]
                    ]);
                }
            ]
        ]);

        $pluginManager = $serviceManager->get(ValidatorPluginManager::class);
        $foo = $pluginManager->get(Foo::class);
        $this->assertInstanceOf(Foo::class, $foo);
    }

}
