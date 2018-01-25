<?php

namespace learning\Patterns\Observer\Example2\Tests;

use learning\Patterns\Observer\Example2\PatternObserver;
use learning\Patterns\Observer\Example2\PatternSubject;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{

    public function testObserver()
    {
        $patternGossiper = new PatternSubject();
        $patternGossipFan = new PatternObserver();
        $patternGossiper->attach($patternGossipFan);
        $favorites = $patternGossiper->updateFavorites(['abstract factory', 'decorator', 'visitor']);
        $this->assertEquals(['abstract factory', 'decorator', 'visitor', 'data mapper'], $favorites[0]);
    }

}
