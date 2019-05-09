<?php

namespace learning\Architecture\Hexagonal\Example1;

class SomeClass
{

    /** @var NotifierInterface */
    private $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function doStuff(): void
    {
        $message = new Message('some@email.com', 'This is a message');
        $this->notifier->notify($message);
    }
}
