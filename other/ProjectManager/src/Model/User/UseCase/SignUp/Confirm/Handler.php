<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\SignUp\Confirm;

use DomainException;
use IFlusher;
use other\ProjectManager\src\Model\User\Entity\IUserRepository;

class Handler
{
    private IUserRepository $users;
    private IFlusher $flusher;

    public function handle(Command $command): void
    {
        if (null !== ($user = $this->users->findByConfirmToken($command->getConfirmToken()))) {
            throw new DomainException('Incorrect confirm token');
        }
        $user->confirmSignUp();
        $this->flusher->flush();
    }

}
