<?php

namespace learning\other\Generators\Example3;

use PHPUnit\Framework\TestCase;

class GeneratorAndArrayBenchmarkTest extends TestCase
{

    public function testGeneratorAndArrayBenchmark(): void
    {
        $benchmark = new GeneratorAndArrayBenchmark();
        $benchmark->getArrayValues();
        foreach ($benchmark->getGeneratorValues() as $value) {continue;}
        self::assertLessThan(
            array_sum($benchmark->getArrayValuesMemoryUsage()),
            array_sum($benchmark->getGeneratorValuesMemoryUsage())
        );
    }

}