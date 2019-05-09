<?php

namespace learning\Zend\EventManager\ShortCircuitingListener;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class ExperimentalClass implements EventManagerAwareInterface
{

    /**
     * @var EventManager
     */
    private $events;


    public function someExpensiveCall($criteria1, $criteria2)
    {
        $params = compact('criteria1', 'criteria2');
        $results = $this->getEventManager()->triggerUntil(
            function ($resultClass) {
                return ($resultClass instanceof SomeResultClass);
            },
            __FUNCTION__,
            $this,
            $params
        );

        if ($results->stopped()) {
            return $results->last();
        }

        //...do something
        return null;
    }

    public function do()
    {
        $results = $this->getEventManager()->trigger(__FUNCTION__, $this);
        if ($results->stopped()) {
            return $results->last();
        }
        //...do something
        return null;
    }
    /**
     * @param EventManagerInterface $eventManager
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->events = $eventManager;
    }

    /**
     * @return EventManager
     */
    public function getEventManager(): EventManager
    {
        return $this->events;
    }
}
