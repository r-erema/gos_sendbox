<?php

namespace learning\Patterns\Proxy\Example2\Tests;

use PHPUnit\Framework\TestCase,
    learning\Patterns\Proxy\Example2\HeavyBankAccountProxy;

class ProxyTest extends TestCase
{

    public function testProxy(): void
    {
        $account = new HeavyBankAccountProxy();
        $account->deposit(100);
        $account->deposit(255);
        $this->assertEquals(355, $account->getBalance());
    }

}