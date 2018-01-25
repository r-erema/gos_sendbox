<?php

namespace learning\Patterns\Observer\Example2;

abstract class AbstractObserver {
    abstract function update(AbstractSubject $subjectIn);
}