<?php

namespace learning\Architecture\Hexagonal\Example1;

class NotifierLogger implements NotifierInterface
{

    /** @var NotifierInterface */
    private $next;

    /** @var Logger */
    private $logger;

    public function __construct(NotifierInterface $next, Logger $logger)
    {
        $this->next = $next;
        $this->logger = $logger;
    }

    public function notify(MessageInterface $message): bool
    {
        $this->logger->log($message);
        return $this->next->notify($message);
    }
}
