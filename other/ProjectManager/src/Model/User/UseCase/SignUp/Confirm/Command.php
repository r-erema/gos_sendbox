<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\SignUp\Confirm;

class Command
{
    private string $confirmToken;

    public function __construct(string $confirmToken)
    {
        $this->confirmToken = $confirmToken;
    }

    public function getConfirmToken(): string
    {
        return $this->confirmToken;
    }

}
