<?php

namespace learning\Zend\EventManager\Example1;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class ExperimentalClass implements EventManagerAwareInterface
{

    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * @param EventManagerInterface $eventManager
     * @return ExperimentalClass
     */
    public function setEventManager(EventManagerInterface $eventManager): self
    {
        $eventManager->setIdentifiers([
            __CLASS__,
            get_called_class()
        ]);
        $this->events = $eventManager;
        return $this;
    }

    /**
     * @return EventManagerInterface
     */
    public function getEventManager(): EventManagerInterface
    {
        if ($this->events === null) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }


    /**
     * @param $arg1
     * @param null $arg2
     */
    public function experimentalMethod($arg1, $arg2 = null)
    {
        $params = compact('arg1', 'arg2');
        $this->getEventManager()->trigger(__FUNCTION__, $this, $params);
    }
}
