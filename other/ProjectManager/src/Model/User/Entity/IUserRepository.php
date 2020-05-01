<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Entity;

interface IUserRepository
{
    public function get(Id $id): User;
    public function getByEmail(Email $email): User;
    public function hasByEmail(Email $email): bool;
    public function hasByNetworkIdentity(string $networkName, string $identity): bool;
    public function findByConfirmToken(string $token): ?User;
    public function findByResetToken(string $token): ?User;
    public function add(User $user): void;
}
