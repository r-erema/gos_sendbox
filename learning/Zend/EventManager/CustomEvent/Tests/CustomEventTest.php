<?php

namespace learning\Zend\EventManager\CustomEvent\Tests;

use learning\Zend\EventManager\CustomEvent\CustomEvent;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;

class CustomEventTest extends TestCase
{
    public function testCustomEvent()
    {
        $customEvent = new CustomEvent();
        $customEvent->setName(CustomEvent::class);
        $events = new EventManager();

        $events->attach(CustomEvent::class, function (EventInterface $event) {
            return $event->getName();
        });

        $result = $events->triggerEvent($customEvent);
        $this->assertEquals(CustomEvent::class, $result->last());
    }
}
