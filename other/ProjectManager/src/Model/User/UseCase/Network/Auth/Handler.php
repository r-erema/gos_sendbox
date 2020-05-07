<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\Network\Auth;

use DateTimeImmutable;
use other\ProjectManager\src\Infrastructure\Service\IFlusher;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\Network;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Exception\UserAlreadyExists;
use other\ProjectManager\src\Model\User\Repository\IUserRepository;
use Ramsey\Uuid\Uuid;

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
        if ($this->users->hasByNetworkIdentity($command->getNetworkName(), $command->getIdentity())) {
            throw new UserAlreadyExists();
        }

        $user = User::signUpByNetwork(
            Uuid::uuid4(),
            new DateTimeImmutable(),
            $command->getNetworkName(),
            $command->getIdentity()
        );

        $this->users->add($user);
        $this->flusher->flush();
    }

}
