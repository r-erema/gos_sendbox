<?php

namespace learning\Patterns\State\Example2;

class OrderContext
{

    /** @var State */
    private $state;

    public static function create(): OrderContext
    {
        $order = new self();
        $order->state = new StateCreated();
        return $order;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function proceedToNext()
    {
        $this->state->proceedToNext($this);
    }

    public function toString(): string
    {
        return $this->state->toString();
    }
}