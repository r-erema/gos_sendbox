<?php

namespace learning\Zend\ServiceManager\AbstractFactoriesTest\Tests;

use learning\Zend\ServiceManager\AbstractFactories\Adapter;
use learning\Zend\ServiceManager\AbstractFactories\AdapterFactory;
use learning\Zend\ServiceManager\AbstractFactories\Cache;
use learning\Zend\ServiceManager\AbstractFactories\CacheAdapter;
use learning\Zend\ServiceManager\AbstractFactories\UserMapper;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use Zend\ServiceManager\ServiceManager;

class AbstractFactoriesTest extends TestCase
{
    public function testAbstractFactories()
    {
        $serviceManager = new ServiceManager([
            'services' => [
                'config' => [
                    ConfigAbstractFactory::class => [
                        CacheAdapter::class => [],
                        Cache::class => [
                            CacheAdapter::class
                        ],
                        UserMapper::class => [
                            Adapter::class,
                            Cache::class
                        ],
                    ]
                ]
            ],
            'factories' => [
                Adapter::class => AdapterFactory::class
            ]
        ]);

        $serviceManager->addAbstractFactory(new ConfigAbstractFactory());
        $this->assertInstanceOf(UserMapper::class, $serviceManager->get(UserMapper::class));
    }
}
