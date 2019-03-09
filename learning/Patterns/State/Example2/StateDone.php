<?php

namespace learning\Patterns\State\Example2;

class StateDone implements State
{
    public function proceedToNext(OrderContext $context): void {}

    public function toString(): string
    {
        return 'done';
    }

}