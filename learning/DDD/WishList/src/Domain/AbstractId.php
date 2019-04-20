<?php

declare(strict_types=1);

namespace learning\DDD\WishList\src\Domain;

use Exception,
    learning\DDD\WishList\src\Domain\Exception\InvalidIdentityException,
    Ramsey\Uuid\Exception\InvalidUuidStringException,
    Ramsey\Uuid\Uuid,
    Ramsey\Uuid\UuidInterface;

abstract class AbstractId
{

    protected $id;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $id
     * @return AbstractId
     * @throws InvalidIdentityException
     */
    public static function fromString(string $id): self
    {
        try {
            return new static(Uuid::fromString($id));
        } catch (InvalidUuidStringException $e) {
            throw new InvalidIdentityException($id);
        }
    }

    /**
     * @throws Exception
     */
    public static function next(): self
    {
        return new static(Uuid::uuid4());
    }

    public function getId(): string
    {
        return $this->id->toString();
    }

    public function equalTo(AbstractId $id): bool
    {
        return $this->getId() === $id->getId();
    }

    public function __toString(): string
    {
        return $this->getId();
    }
}