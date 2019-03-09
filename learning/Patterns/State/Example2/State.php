<?php

namespace learning\Patterns\State\Example2;

interface State
{

    public function proceedToNext(OrderContext $context): void;

    public function toString(): string;

}