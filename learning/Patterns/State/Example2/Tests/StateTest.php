<?php
namespace learning\Patterns\State\Example2\Tests;
use learning\Patterns\State\Example2\OrderContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase {

    public function testIsCreatedWithStateCreated(): void
    {
        $orderContext = OrderContext::create();
        $orderContext->toString();
        $this->assertEquals('created', $orderContext->toString());
    }

    public function testCanProceedToStateShipped(): void
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();

        $this->assertEquals('shipped', $contextOrder->toString());
    }

    public function testCanProceedToStateDone(): void
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();
        $contextOrder->proceedToNext();

        $this->assertEquals('done', $contextOrder->toString());
    }

    public function testStateDoneIsTheLastPossibleState(): void
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();
        $contextOrder->proceedToNext();

        $this->assertEquals('done', $contextOrder->toString());
    }
}