<?php
namespace learning\Zend\EventManager\Example1\Tests;

use PHPUnit\Framework\TestCase,
    learning\Zend\EventManager\Example1\ExperimentalClass,
    Zend\EventManager\Event,
    Zend\EventManager\EventManager,
    Zend\EventManager\SharedEventManager,
    learning\Zend\EventManager\Helpers\Logger;

class EventManagerTest extends TestCase
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
        unlink($this->logFilePath);
    }

    public function testEventManager()
    {
        $experimentalClass = new ExperimentalClass();
        $experimentalClass->getEventManager()->attach('experimentalMethod', function (Event $event) {
            $eventName = $event->getName();
            $target = get_class($event->getTarget());
            $params = json_encode($event->getParams());

            $this->logger->info(sprintf(
                '%s called on %s, using params %s',
                $eventName,
                $target,
                $params
            ));
        });
        $experimentalClass->experimentalMethod('param1', 'param2');
        $logContent = $this->readLog();
        $this->assertContains(
            'experimentalMethod called on learning\Zend\EventManager\Example1\ExperimentalClass, using params {"arg1":"param1","arg2":"param2"}',
            $logContent
        );
    }

    public function testSharedEventManager()
    {
        $sharedManager = new SharedEventManager();
        $sharedManager->attach(ExperimentalClass::class, 'experimentalMethod', function (Event $event) {
            $eventName = $event->getName();
            $target = get_class($event->getTarget());
            $params = json_encode($event->getParams());

            $this->logger->info(sprintf(
                '%s called on %s, using params %s',
                $eventName,
                $target,
                $params
            ));
        });
        $experimentalClass = new ExperimentalClass();
        $experimentalClass->setEventManager(new EventManager($sharedManager));
        $experimentalClass->experimentalMethod('param1', 'param2');
        $logContent = $this->readLog();;
        $this->assertContains(
            'experimentalMethod called on learning\Zend\EventManager\Example1\ExperimentalClass, using params {"arg1":"param1","arg2":"param2"}',
            $logContent
        );
    }

    public function testEventManager2()
    {
        $events = new EventManager();
        $events->attach('do', function (Event $e) {
            $eventName = $e->getName();
            $target = get_class($e->getTarget());
            $params = json_encode($e->getParams());
            $this->logger->info(sprintf(
                '%s called on %s, using params %s',
                $eventName,
                $target,
                $params
            ));
        });
        $events->trigger('do', $this, ['param1' => 'param1Value', 'param2' => 'param2Value']);
        $logContent = $this->readLog();
        $this->assertContains(
            'do called on learning\Zend\EventManager\Example1\Tests\EventManagerTest, using params {"param1":"param1Value","param2":"param2Value"}',
            $logContent
        );
    }
}