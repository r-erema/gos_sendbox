<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\Doctrine\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;
use other\ProjectManager\src\Model\User\Entity\Network;

class NetworkType extends AbstractEnumType
{
    protected static $choices = Network::NETWORKS;
}
