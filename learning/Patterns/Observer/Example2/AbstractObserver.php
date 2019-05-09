<?php

namespace learning\Patterns\Observer\Example2;

abstract class AbstractObserver
{
    abstract public function update(AbstractSubject $subjectIn);
}
