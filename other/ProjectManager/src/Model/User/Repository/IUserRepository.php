<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Repository;

use other\ProjectManager\src\Infrastructure\Exception\EntityNotFoundException;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\User;
use Ramsey\Uuid\UuidInterface;

interface IUserRepository
{

    /**
     * @param UuidInterface $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function get(UuidInterface $id): User;

    /**
     * @param Email $email
     * @return User
     * @throws EntityNotFoundException
     */
    public function getByEmail(Email $email): User;

    public function hasByEmail(Email $email): bool;
    public function findByEmail(Email $email): ?User;
    public function hasByNetworkIdentity(string $networkName, string $identity): bool;
    public function findByNetworkIdentity(string $networkName, string $identity): ?User;
    public function findByConfirmToken(string $token): ?User;
    public function findByResetToken(string $token): ?User;
    public function add(User $user): void;
}
