<?php

namespace learning\Patterns\Observer\Example2;

abstract class AbstractSubject
{
    abstract public function attach(AbstractObserver $observerIn);
    abstract public function detach(AbstractObserver $observerIn);
    abstract public function notify();
}
