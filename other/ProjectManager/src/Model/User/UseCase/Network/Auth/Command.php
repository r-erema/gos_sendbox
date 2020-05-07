<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\Network\Auth;

class Command
{
    private string $networkName;
    private string $identity;

    public function __construct(string $networkName, string $identity)
    {
        $this->networkName = $networkName;
        $this->identity = $identity;
    }

    public function getNetworkName(): string
    {
        return $this->networkName;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }
}
