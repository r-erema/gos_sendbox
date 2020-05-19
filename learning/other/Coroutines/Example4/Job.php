<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example4;


use Generator;
use Webmozart\Assert\Assert;

class Job
{

    public const COMMAND_RUN = 'run';
    public const COMMAND_STOP = 'stop';

    private Generator $generator;

    public function __construct(callable $usefulWork)
    {
        $this->generator = (static function () use ($usefulWork): Generator {
            $result = [];
            while (true) {
                $command = yield;
                Assert::oneOf($command, [self::COMMAND_RUN, self::COMMAND_STOP]);
                switch ($command) {
                    case self::COMMAND_RUN: {
                        $result[] = $usefulWork();
                        break;
                    }
                    case self::COMMAND_STOP: {
                        yield $result;
                    }
                }
            }
        })();
    }

    public function run(): void
    {
        $this->generator->send(self::COMMAND_RUN);
    }

    public function stop(): array
    {
        return $this->generator->send(self::COMMAND_STOP);
    }

}
