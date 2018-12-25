<?php

namespace learning\Patterns\State\Example2;

class StateDone implements State
{
    public function proceedToNext(OrderContext $context) {}

    public function toString(): string
    {
        return 'done';
    }

}