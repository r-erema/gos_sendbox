<?php

namespace learning\Patterns\State\Example2;

interface State
{

    public function proceedToNext(OrderContext $context);

    public function toString(): string;

}