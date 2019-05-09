<?php

namespace learning\Zend\EventManager\IntrospectingResults\Tests;

use learning\Zend\EventManager\Helpers\Logger;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;

class IntrospectingResultsTest extends TestCase
{
    use Logger;

    public function testIntrospectingResults()
    {
        $events = new EventManager();

        $callable = function (Event $event) {
            return "Callable1: {$event->getName()}";
        };
        $stdClass = new \stdClass();
        $callable2 = function () use ($stdClass) {
            return $stdClass;
        };
        $callable3 = function (Event $event) {
            return "Callable2: {$event->getName()}";
        };

        $events->attach('do', $callable);
        $events->attach('do', $callable2);
        $events->attach('do', $callable3);
        $responseCollection = $events->trigger('do');
        $this->assertEquals('Callable1: do', $responseCollection->first());
        $this->assertEquals('Callable2: do', $responseCollection->last());
        $this->assertTrue($responseCollection->contains($stdClass));
    }
}
