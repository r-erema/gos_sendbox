<?php
namespace learning\Zend\EventManager\Example1\Tests;

use PHPUnit\Framework\TestCase,
    Zend\Log\Logger,
    learning\Zend\EventManager\Example1\ExperimentalClass,
    Zend\EventManager\Event,
    Zend\EventManager\EventManager,
    Zend\EventManager\SharedEventManager;

class EventManagerTest extends TestCase
{

    /**
     * @var string
     */
    private $logFile;

    /**
     * @var Logger
     */
    private $logger;

    public function setUp()
    {
        $this->logFile =  __DIR__ . '/test.log';
        $logger = new Logger();
        $logger->addWriter('stream', null, ['stream' => $this->logFile]);
        $this->logger =  $logger;
    }

    public function tearDown()
    {
        unlink($this->logFile);
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
        $logContent = file_get_contents($this->logFile);
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
        $logContent = file_get_contents($this->logFile);
        $this->assertContains(
            'experimentalMethod called on learning\Zend\EventManager\Example1\ExperimentalClass, using params {"arg1":"param1","arg2":"param2"}',
            $logContent
        );
    }

    public function testEventManager2()
    {
        $events = new EventManager();
        $logger = new Logger();
        $logger->addWriter('stream', null, ['stream' => $this->logFile]);
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
        $events->trigger('do', null, ['param1' => 'param1Value', 'param2' => 'param2Value']);
        $logContent = file_get_contents($this->logFile);
        $this->assertContains(
            'do called on learning\Zend\EventManager\Example1\Tests\EventManagerTest, using params {"param1":"param1Value","param2":"param2Value"}',
            $logContent
        );
    }
}