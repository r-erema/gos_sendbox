<?php

namespace learning\Zend\EventManager\Example2\Tests;

use learning\Zend\EventManager\Example2\Example;
use learning\Zend\EventManager\Helpers\Logger;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManager;

class EventManagerTest extends TestCase
{

    use Logger;

    public function setUp(): void
    {
        $this->initLogger();
    }

    public function tearDown(): void
    {
        $this->destroyLogFile();
    }

    public function testEventManager()
    {
        $events = new EventManager();
        $events->attach('do', function (Event $e) {
            $event = $e->getName();
            $params = $e->getParams();
            $this->logger->info(sprintf(
                'Handled event "%s", with parameters %s',
                $event,
                json_encode($params)
            ));
        });

        $params = ['param1' => 'value1', 'param2' => 'value2'];
        $events->trigger('do', null, $params);
        $log = $this->readLog();
        $this->assertStringContainsString('Handled event "do", with parameters {"param1":"value1","param2":"value2"}', $log);
    }

    public function testEventManager2()
    {
        $example = new Example();
        $example->getEventManager()->attach('doIt', function (Event $e) {
            $event = $e->getName();
            $target = get_class($e->getTarget());
            $params = $e->getParams();
            $this->logger->info(sprintf(
                'Handled event "%s" on target "%s", with parameters %s',
                $event,
                $target,
                json_encode($params)
            ));
        });

        $example->doIt('value1', 'value2');
        $log = $this->readLog();
        $this->assertStringContainsString('Handled event "doIt" on target "learning\Zend\EventManager\Example2\Example", with parameters {"param1":"value1","param2":"value2"}', $log);
    }

    public function testSharedEventManager()
    {
        $sharedEvents = new SharedEventManager();
        $sharedEvents->attach(Example::class, 'doIt', function (Event $e) {
            $event = $e->getName();
            $target = get_class($e->getTarget());
            $params = $e->getParams();
            $this->logger->info(sprintf(
                'Handled event "%s" on target "%s", with parameters %s',
                $event,
                $target,
                json_encode($params)
            ));
        });

        $example = new Example();
        $example->setEventManager(new EventManager($sharedEvents));
        $example->doIt('value1', 'value2');
        $log = $this->readLog();
        $this->assertStringContainsString('Handled event "doIt" on target "learning\Zend\EventManager\Example2\Example", with parameters {"param1":"value1","param2":"value2"}', $log);

    }

}
