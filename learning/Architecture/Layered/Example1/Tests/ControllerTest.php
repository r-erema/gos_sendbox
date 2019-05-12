<?php

declare(strict_types=1);

namespace learning\Architecture\Layered\Example1\Tests;

use learning\Architecture\Layered\Example1\Controllers\PostsController,
    PHPUnit\Framework\TestCase,
    Psr\Http\Message\RequestInterface,
    ReflectionException,
    Twig\Error\LoaderError,
    Twig\Error\RuntimeError,
    Twig\Error\SyntaxError,
    PHPUnit\Framework\MockObject\MockObject,
    Psr\Http\Message\StreamInterface;

class ControllerTest extends TestCase
{

    /**
     * @throws ReflectionException
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function testController(): void
    {
        $controller = new PostsController();
        /** @var RequestInterface|MockObject $request */
        $request = $this->getMockBuilder(RequestInterface::class)->getMock();
        /** @var StreamInterface|MockObject $body */
        $body = $this->getMockBuilder(StreamInterface::class)->getMock();
        $request->method('getBody')->willReturn($body);
        $request->withBody($body);
        $body->method('getContents')->willReturn(json_encode([
            'title' => 'Lorem ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac dictum nisl.'
        ]));
        $output = $controller->updateAction($request);
        /** @noinspection UnknownInspectionInspection */
        /** @noinspection HtmlUnknownTarget */
        self::assertStringContainsString('<td><a href="/edit/Lorem ipsum/">Edit Post</a></td>', $output);
        self::assertStringContainsString('<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac dictum nisl.</div>', $output);
    }

}