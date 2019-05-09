<?php

namespace learning\Zend\EventManager\ShortCircuitingListener\Tests;

use learning\Zend\EventManager\ShortCircuitingListener\ExperimentalClass;
use learning\Zend\EventManager\ShortCircuitingListener\SomeResultClass;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;

class ShortCircuitingListenerTest extends TestCase
{
    public function testShortCircuitingListener()
    {
        $experimentalClass = new ExperimentalClass();
        $events = new EventManager();
        $experimentalClass->setEventManager($events);
        $events->attach('someExpensiveCall', function () {
            return new SomeResultClass();
        });
        $result = $experimentalClass->someExpensiveCall('param1', 'param2');
        $this->assertInstanceOf(SomeResultClass::class, $result);

        $events->attach('do', function (Event $e) {
            $e->stopPropagation();
            return new SomeResultClass();
        });
        $result = $experimentalClass->do();
        $this->assertInstanceOf(SomeResultClass::class, $result);
    }
}
