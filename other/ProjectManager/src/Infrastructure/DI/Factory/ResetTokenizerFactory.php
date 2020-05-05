<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\DI\Factory;

use DateInterval;
use Exception;
use other\ProjectManager\src\Model\User\Service\ResetTokenizer;

class ResetTokenizerFactory
{
    /**
     * @param string $interval
     * @return ResetTokenizer
     * @throws Exception
     */
    public function create(string $interval): ResetTokenizer
    {
        return new ResetTokenizer(new DateInterval($interval));
    }
}
