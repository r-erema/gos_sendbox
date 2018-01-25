<?php


namespace learning\Patterns\Observer\Example1\Tests;

use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{

    public function testChangeInUserLeadsToUserObserverBeingNotified()
    {
        $observer = new \learning\Patterns\Observer\Example1\UserObserver();

        $user = new \learning\Patterns\Observer\Example1\User();
        $user->attach($observer);
        $user->setEmail('example@ma.il');

        $user2 = new \learning\Patterns\Observer\Example1\User();
        $user2->attach($observer);
        $user->setEmail('example2@ma.il');

        $this->assertCount(2, $observer->getChangedUsers());
    }

}
