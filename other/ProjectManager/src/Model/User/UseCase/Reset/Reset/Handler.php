<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\Reset\Reset;

use DateTimeImmutable;
use other\ProjectManager\src\Infrastructure\Service\IFlusher;
use other\ProjectManager\src\Model\User\Exception\BadResetToken;
use other\ProjectManager\src\Model\User\Repository\IUserRepository;
use other\ProjectManager\src\Model\User\Service\PasswordHasher;

class Handler
{
    private IUserRepository $users;
    private IFlusher $flusher;

    public function __construct(IUserRepository $users, IFlusher $flusher)
    {
        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        if (null === ($user = $this->users->findByResetToken($command->getResetToken()))) {
            throw new BadResetToken();
        }

        $user->passwordReset(new DateTimeImmutable(), PasswordHasher::hash($command->getResetToken()));

        $this->flusher->flush();
    }

}
