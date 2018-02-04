<?php

namespace learning\Zend\EventManager\Order\Tests;

use learning\Zend\EventManager\Helpers\Logger;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;

class OrderTest extends TestCase
{

    /**
     * @var string
     */
    private $result = '';

    public function testOrder()
    {
        $events = new EventManager();
        $events->attach('Example', function (Event $e) {
            $event  = $e->getName();
            $target = get_class($e->getTarget()); // "Example"
            $params = $e->getParams();
            $this->result .= (sprintf(
                'Handled event "%s" on target "%s", with parameters %s, priority: 1',
                $event,
                $target,
                json_encode($params)
            )) . PHP_EOL;
        });
        $events->attach('Example', function (Event $e) {
            $event  = $e->getName();
            $target = get_class($e->getTarget()); // "Example"
            $params = $e->getParams();
            $this->result .= (sprintf(
                'Handled event "%s" on target "%s", with parameters %s, priority: 100',
                $event,
                $target,
                json_encode($params)
            )) . PHP_EOL;
        }, 100);
        $events->trigger('Example');
        $this->assertEquals(
            'Handled event "Example" on target "learning\Zend\EventManager\Order\Tests\OrderTest", with parameters [], priority: 100' . PHP_EOL .
            'Handled event "Example" on target "learning\Zend\EventManager\Order\Tests\OrderTest", with parameters [], priority: 1' .PHP_EOL,
            $this->result
        );
    }
}
