<?php


namespace learning\Patterns\Observer\Example1\Tests;

use learning\Patterns\Observer\Example1\User,
    learning\Patterns\Observer\Example1\UserObserver,
    PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{

    public function testChangeInUserLeadsToUserObserverBeingNotified(): void
    {
        $observer = new UserObserver();

        $user = new User();
        $user->attach($observer);
        $user->setEmail('example@ma.il');

        $user2 = new User();
        $user2->attach($observer);
        $user->setEmail('example2@ma.il');

        $this->assertCount(2, $observer->getChangedUsers());
    }

}
