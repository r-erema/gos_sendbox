<?php

namespace learning\Zend\ServiceManager\LazyServices\Tests;

use learning\Zend\ServiceManager\LazyServices\Buzzer;
use learning\Zend\ServiceManager\LazyServices\Foo;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\Proxy\LazyServiceFactory;
use Zend\ServiceManager\ServiceManager;

class LazyServicesTest extends TestCase
{
    public function testLazyServices()
    {
        $serviceManager = new ServiceManager([
            'factories' => [Buzzer::class => InvokableFactory::class],
            'lazy_services' => [
                'class_map' => [Buzzer::class => Buzzer::class],
                'proxies_target_dir' => 'learning/Zend/ServiceManager/LazyServices/data/proxies',
                'write_proxy_files' => true
            ],
            'delegators' => [
                Buzzer::class => [
                    LazyServiceFactory::class
                ]
            ]
        ]);

        $buzzer = null;
        for ($i = 0; $i < 100; $i++) {
            $buzzer = $serviceManager->get(Buzzer::class); /** @var Buzzer $buzzer */
        }

        $this->assertEquals('Buzz!', $buzzer->buzz());
    }
}
