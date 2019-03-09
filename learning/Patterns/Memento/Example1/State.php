<?php

declare(strict_types=1);

namespace learning\Patterns\Memento\Example1;

class State
{

    private $state;

    public const STATE_CREATED = 'created',
                 STATE_OPENED = 'opened',
                 STATE_ASSIGNED = 'assigned',
                 STATE_CLOSED = 'closed';

    private static $validStates = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED
    ];

    public function __construct(string $state)
    {
        self::ensureIsValidState($state);
        $this->state = $state;
    }

    private static function ensureIsValidState(string $state): void
    {
        if (!in_array($state, self::$validStates, true)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    public function __toString(): string
    {
        return $this->state;
    }

}