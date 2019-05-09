<?php

namespace learning\Zend\EventManager\ListenerAggregates;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Log\Logger;

class LogEvents implements ListenerAggregateInterface
{
    private $listeners = [];

    /**
     * @var Logger
     */
    private $log;

    public function __construct(Logger $log)
    {
        $this->log = $log;
    }


    /**
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach('do', [$this, 'log']);
        $this->listeners[] = $events->attach('doSomethingElse', [$this, 'log']);
    }

    /**
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }

    /**
     * @param EventInterface $e
     */
    public function log(EventInterface $e)
    {
        $events = $e->getName();
        $params = $e->getParams();
        $this->log->info(sprintf('%s: %s', $events, json_encode($params)));
    }
}
