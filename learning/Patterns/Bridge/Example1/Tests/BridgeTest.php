<?php
declare(strict_types=1);

namespace learning\Patterns\Bridge\Tests;

use learning\Patterns\Bridge\Example1\HelloWorldService;
use learning\Patterns\Bridge\Example1\HtmlFormatter;
use learning\Patterns\Bridge\Example1\PlainTextFormatter;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{

    public function testCanPrintUsingThePlainTextPrinter(): void
    {
        $service = new HelloWorldService(new PlainTextFormatter());
        $this->assertEquals('Hello World', $service->get());

        $service->setImplementation(new HtmlFormatter());
        $this->assertEquals('<p>Hello World</p>', $service->get());
    }

}