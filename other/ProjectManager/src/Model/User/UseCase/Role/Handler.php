<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\Role;

use IFlusher;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\IUserRepository;
use other\ProjectManager\src\Model\User\Entity\Role;

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
        $user = $this->users->get(new Id($command->getUserId()));
        $user->setRole(new Role($command->getRole()));
        $this->flusher->flush();
    }

}
