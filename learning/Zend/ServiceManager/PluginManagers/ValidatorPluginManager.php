<?php

namespace learning\Zend\ServiceManager\PluginManagers;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception\InvalidServiceException;
use Zend\Validator\ValidatorInterface;

class ValidatorPluginManager extends AbstractPluginManager
{
    protected $instanceOf = ValidatorInterface::class;

    public function validate($instance)
    {
        if ($instance instanceof Foo || $instance instanceof Bar) {
            return;
        }

        throw new InvalidServiceException('This is not a valid service!');
    }
}
