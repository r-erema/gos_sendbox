<?php

namespace learning\Patterns\State\Example2;

class StateShipped implements State
{
    public function proceedToNext(OrderContext $context): void
    {
        $context->setState(new StateDone());
    }

    public function toString(): string
    {
        return 'shipped';
    }

}