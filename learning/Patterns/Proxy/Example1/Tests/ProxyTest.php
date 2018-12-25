<?php

namespace learning\Patterns\Proxy\Example1\Tests;

class ProxyTest extends \PHPUnit\Framework\TestCase
{

    public function testProxy()
    {
        $image = new \learning\Patterns\Proxy\Example1\Image('image.jpg');
        $image->getImageContents();
        $image->getImageContents();
        $this->assertEquals(2, $image->getLoadsCount());

        $proxyImage = new \learning\Patterns\Proxy\Example1\ProxyImage('image.jpg');
        $proxyImage->getImageContents();
        $proxyImage->getImageContents();
        $proxyImage->getImageContents();
        $proxyImage->getImageContents();
        $this->assertEquals(1, $proxyImage->getLoadsCount());
    }

}