<?php
namespace learning\Patterns\State\Example2\Tests;
use learning\Patterns\State\Example2\OrderContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase {

    /**
     * @test
     */
    public function testIsCreatedWithStateCreated()
    {
        $orderContext = OrderContext::create();
        $orderContext->toString();
        $this->assertEquals('created', $orderContext->toString());
    }

    /**
     * @test
     */
    public function testCanProceedToStateShipped()
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();

        $this->assertEquals('shipped', $contextOrder->toString());
    }

    /**
     * @test
     */
    public function testCanProceedToStateDone()
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();
        $contextOrder->proceedToNext();

        $this->assertEquals('done', $contextOrder->toString());
    }

    /**
     * @test
     */
    public function testStateDoneIsTheLastPossibleState()
    {
        $contextOrder = OrderContext::create();
        $contextOrder->proceedToNext();
        $contextOrder->proceedToNext();

        $this->assertEquals('done', $contextOrder->toString());
    }
}