<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Service;

use other\ProjectManager\src\Model\User\Entity\Email;

class ResetTokenSender implements IResetTokenSender
{

    public function send(Email $email, string $token): void
    {
        // TODO: Implement send() method.
    }
}
