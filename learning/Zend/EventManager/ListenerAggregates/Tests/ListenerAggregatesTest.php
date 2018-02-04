<?php

namespace learning\Zend\EventManager\ListenerAggregates\Tests;

use learning\Zend\EventManager\Helpers\Logger;
use learning\Zend\EventManager\ListenerAggregates\LogEvents;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\EventManager;

class ListenerAggregatesTest extends TestCase
{

    use Logger;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->initLogger();
    }

    public function tearDown()
    {
        $this->destroyLogFile();
    }

    public function testListenerAggregates()
    {
        $logListener = new LogEvents($this->logger);
        $events = new EventManager();
        $logListener->attach($events);
        $events->trigger('do', null, ['param1', 'param2']);
        $events->trigger('doSomethingElse', null, ['param3', 'param4']);
        $this->assertContains('do: ["param1","param2"]', $this->readLog());
        $this->assertContains('doSomethingElse: ["param3","param4"]', $this->readLog());
    }
}
