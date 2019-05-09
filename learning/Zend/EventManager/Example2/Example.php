<?php

namespace learning\Zend\EventManager\Example2;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class Example implements EventManagerAwareInterface
{

    /**
     * @var EventManager
     */
    protected $events;

    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers([
            __CLASS__,
            get_class($this)
        ]);
        $this->events = $eventManager;
    }

    /**
     * @return EventManager
     */
    public function getEventManager(): EventManager
    {
        if (!$this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }

    /**
     * @param $param1
     * @param $param2
     */
    public function doIt($param1, $param2)
    {
        $params = compact('param1', 'param2');
        $this->getEventManager()->trigger(__FUNCTION__, $this, $params);
    }
}
