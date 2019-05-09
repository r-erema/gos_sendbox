<?php

namespace learning\Zend\ServiceManager\AbstractFactories;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class UserMapperAbstractFactory implements AbstractFactoryInterface
{
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        // TODO: Implement canCreate() method.
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        [
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
        ];
    }
}
