<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Builder\User;

use BadMethodCallException;
use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\Network;
use other\ProjectManager\src\Model\User\Entity\Role;
use other\ProjectManager\src\Model\User\Entity\User;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class UserBuilder
{
    private UuidInterface $id;
    private DateTimeImmutable $date;

    private Email $email;
    private string $hash;
    private string $token;
    private bool $confirmed = false;

    private ?Network $network = null;

    private ?Role $role = null;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->date = new DateTimeImmutable();
    }

    public function viaEmail(Email $email = null, string $hash = null, string $token = null): self
    {
        $clone = clone $this;
        $clone->email = $email ?? new Email('mail@app.test');
        $clone->hash = $hash ?? 'hash';
        $clone->token = $token ?? 'token';
        return $clone;
    }

    public function confirmed(): self
    {
        $clone = clone $this;
        $clone->confirmed = true;
        return $clone;
    }

    public function viaNetwork(Network $network = null, string $identity = null): self
    {
        $clone = clone $this;
        $clone->network = $network ?? new Network(Uuid::uuid4(), Network::NETWORK_GOOGLE, '001');
        return $clone;
    }

    public function withId(UuidInterface $id): self
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function withRole(Role $role): self
    {
        $clone = clone $this;
        $clone->role = $role;
        return $clone;
    }

    public function build(): User
    {
        $user = null;

        if ($this->email) {
            $user = User::signUpByEmail(
                $this->id,
                $this->date,
                $this->email,
                $this->hash,
                $this->token
            );

            if ($this->confirmed) {
                $user->confirmSignUp();
            }
        }

        if ($this->network) {
            $user = User::signUpByNetwork($this->id, $this->date, $this->network);
        }

        if (!$user) {
            throw new BadMethodCallException('Specify via method.');
        }

        if ($this->role) {
            $user->setRole($this->role);
        }

        return $user;
    }
}
