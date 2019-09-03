<?php

declare(strict_types=1);

namespace learning\Symfony\DIC\Example1\Tests;

use Exception;
use learning\Symfony\DIC\Example1\ReverseStringFormatter;
use learning\Symfony\DIC\Example1\StringService;
use learning\Symfony\DIC\Example1\UpperCaseFormatter;
use Symfony\Component\DependencyInjection\Compiler\AutowirePass;
use Symfony\Component\DependencyInjection\Compiler\ResolveClassPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use PHPUnit\Framework\TestCase;

class DICTest extends TestCase
{

    private StringService $stringService;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {

        $container = new ContainerBuilder();

        $container->register(ReverseStringFormatter::class);
        $container->register(UpperCaseFormatter::class);
        $container->autowire(StringService::class);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->stringService = $container->get(StringService::class);
    }

    public function testDIC(): void
    {
        $this->assertEquals('CBA', $this->stringService->reverseAndFormatUpperCase('abc'));
    }
}
