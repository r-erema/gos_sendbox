<?php

declare(strict_types=1);

namespace learning\other\Generators\Example3;

use Generator;

class GeneratorAndArrayBenchmark
{

    private $size,
            $memoryUsageInterval,
            $arrayValuesMemoryUsage,
            $arrayValuesTimeUsage,
            $generatorValuesMemoryUsage,
            $generatorValuesTimeUsage;


    public function __construct(int $size = 200000, int $memoryUsageInterval = 50000)
    {
        $this->size = $size;
        $this->memoryUsageInterval = $memoryUsageInterval;
    }

    public function getArrayValues(): array
    {
        $start = microtime(true);
        $valuesArray = [];
        $this->arrayValuesMemoryUsage[] = self::getMemoryUsage();
        for ($i = 1; $i < $this->size; $i++) {
            $valuesArray[] = $i;
            if (($i % $this->memoryUsageInterval) === 0) {
                $this->arrayValuesMemoryUsage[] = self::getMemoryUsage();
            }
        }
        $this->arrayValuesTimeUsage = microtime(true) - $start;
        return $valuesArray;
    }

    public function getGeneratorValues(): Generator
    {
        $start = microtime(true);
        $this->generatorValuesMemoryUsage[] = self::getMemoryUsage();
        for ($i = 1; $i < $this->size; $i++) {
            yield $i;
            if (($i % $this->memoryUsageInterval) === 0) {
                $this->generatorValuesMemoryUsage[] = self::getMemoryUsage();
            }
        }
        $this->generatorValuesTimeUsage = microtime(true) - $start;
    }

    private static function getMemoryUsage(): float
    {
        return round(memory_get_usage() / 1024 / 1024, 2);
    }

    public function getArrayValuesMemoryUsage(): array
    {
        return $this->arrayValuesMemoryUsage;
    }

    public function getGeneratorValuesMemoryUsage(): array
    {
        return $this->generatorValuesMemoryUsage;
    }

    public function getArrayValuesTimeUsage(): float
    {
        return $this->arrayValuesTimeUsage;
    }

    public function getGeneratorValuesTimeUsage(): float
    {
        return $this->generatorValuesTimeUsage;
    }
}