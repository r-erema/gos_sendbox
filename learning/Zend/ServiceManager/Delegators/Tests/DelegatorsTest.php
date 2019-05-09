<?php

namespace learning\Zend\ServiceManager\Delegators\Tests;

use learning\Zend\ServiceManager\Delegators\Buzzer;
use learning\Zend\ServiceManager\Delegators\BuzzerDelegator;
use learning\Zend\ServiceManager\Delegators\BuzzerDelegatorFactory;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;

class DelegatorsTest extends TestCase
{
    public function testDelegator()
    {
        $wrappedBuzzer = new Buzzer();
        $eventManager = new EventManager();
        $buzzerDelegator = null;
        $eventManager->attach('buzz', function (Event $event) {
            /** @var BuzzerDelegator $buzzerDelegator */
            $buzzerDelegator = $event->getTarget();
            $buzzerDelegator->setResult('Stare at the art!' . PHP_EOL);
        });
        $buzzer = new BuzzerDelegator($wrappedBuzzer, $eventManager);
        $this->assertEquals('Stare at the art!' . PHP_EOL . ' Buzz!', $buzzer->buzz());
    }

    public function testDelegatorFactory()
    {
        $serviceManager = new ServiceManager([
            'factories' => [
                Buzzer::class => InvokableFactory::class,
                EventManager::class => InvokableFactory::class
            ],
            'delegators' => [Buzzer::class => [BuzzerDelegatorFactory::class]]
        ]);
        $buzzerDelegator = $serviceManager->get(Buzzer::class); /** @var BuzzerDelegator $buzzerDelegator */
        $this->assertEquals('Stare at the art!' . PHP_EOL . ' Buzz!', $buzzerDelegator->buzz());
    }
}
