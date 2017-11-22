<?php

namespace learning\Patterns\Observer\Example1;

use SplObserver;

class User implements \SplSubject
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var \SplObjectStorage
     */
    protected $observers;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) { /** @var SplObserver $observer */
            $observer->update($this);
        }
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        $this->notify();
    }

}