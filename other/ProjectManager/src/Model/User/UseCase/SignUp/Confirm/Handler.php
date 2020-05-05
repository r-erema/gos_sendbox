<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\SignUp\Confirm;

use DomainException;
use other\ProjectManager\src\Infrastructure\Service\IFlusher;
use other\ProjectManager\src\Model\User\Repository\IUserRepository;

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
        if (null === ($user = $this->users->findByConfirmToken($command->getConfirmToken()))) {
            throw new DomainException('Incorrect confirm token');
        }
        $user->confirmSignUp();
        $this->flusher->flush();
    }

}
