<?php

namespace learning\Patterns\Observer\Example1;

use SplObserver;

class User implements \SplSubject
{
    private $email;

    protected $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify():void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
        $this->notify();
    }
}
