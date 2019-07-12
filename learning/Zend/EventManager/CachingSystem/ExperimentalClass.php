<?php

namespace learning\Zend\EventManager\CachingSystem;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class ExperimentalClass implements EventManagerAwareInterface
{

    /**
     * @var EventManager
     */
    private $events;

    public function setEventManager(EventManagerInterface $eventManager): self
    {
        $this->events = $eventManager;
        return $this;
    }

    /**
     * @return EventManager
     */
    public function getEventManager(): EventManager
    {
        return $this->events;
    }

    public function someExpensiveCall($criteria1, $criteria2)
    {
        $params = compact('criteria1', 'criteria2');
        $result = $this->getEventManager()->triggerUntil(
            static function ($r) {
                return ($r instanceof SomeResultClass);
            },
            __FUNCTION__ . '.pre',
            $this,
            $params
        );

        if ($result->stopped()) {
            return $result->last();
        }

        // ... do some work ...
        $calculateResults = '1,2,3';

        $params['__RESULT__'] = $calculateResults;
        $this->events->trigger(__FUNCTION__ . '.post', $this, $params);
        return $calculateResults;
    }
}
