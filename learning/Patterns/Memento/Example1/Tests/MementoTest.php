<?php

declare(strict_types=1);

namespace learning\Patterns\Memento\Example1\Tests;

use learning\Patterns\Memento\Example1\State,
    learning\Patterns\Memento\Example1\Ticket,
    PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{

    public function testOpenTicketAssignAndSetBackToOpen(): void
    {
        $ticket = new Ticket();
        $ticket->open();
        $openedState = $ticket->getState();
        $this->assertEquals(State::STATE_OPENED, (string) $ticket->getState());

        $memento = $ticket->saveToMemento();

        $ticket->assign();
        $this->assertEquals(State::STATE_ASSIGNED, (string) $ticket->getState());

        $ticket->restoreFromMemento($memento);

        $this->assertEquals(State::STATE_OPENED, (string) $ticket->getState());
        $this->assertNotSame($openedState, $ticket->getState());
    }

}