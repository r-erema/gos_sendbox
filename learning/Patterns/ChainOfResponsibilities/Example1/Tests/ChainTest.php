<?php

declare(strict_types=1);

namespace learning\Patterns\ChainOfResponsibilities\Example1\Tests;

use learning\Patterns\ChainOfResponsibilities\Example1\Handler,
    learning\Patterns\ChainOfResponsibilities\Example1\HttpInMemoryCacheHandler,
    learning\Patterns\ChainOfResponsibilities\Example1\SlowDatabaseHandler,
    PHPUnit\Framework\TestCase,
    Psr\Http\Message\RequestInterface,
    Psr\Http\Message\UriInterface,
    PHPUnit\Framework\MockObject\MockObject;

class ChainTest extends TestCase
{

    /**
     * @var Handler
     */
    private $chain;

    protected function setUp(): void
    {
        $this->chain = new HttpInMemoryCacheHandler(
            ['/foo/bar?index=1' => 'Hello In Memory!'],
            new SlowDatabaseHandler()
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testCanRequestKeyInFastStorage(): void
    {
        $uri = $this->createMock(UriInterface::class);
        $uri->method('getPath')->willReturn('/foo/bar');
        $uri->method('getQuery')->willReturn('index=1');

        /** @var RequestInterface|MockObject $request */
        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')->willReturn('GET');
        $request->method('getUri')->willReturn($uri);

        $this->assertEquals('Hello In Memory!', $this->chain->handle($request));
    }

    /**
     * @throws \ReflectionException
     */
    public function testCanRequestKeyInSlowStorage(): void
    {
        $uri = $this->createMock(UriInterface::class);

        $uri->method('getPath')->willReturn('/foo/baz');
        $uri->method('getQuery')->willReturn('');

        /** @var RequestInterface|MockObject $request */
        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')->willReturn('GET');
        $request->method('getUri')->willReturn($uri);

        $this->assertEquals('Hello World!', $this->chain->handle($request));

    }
}