<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\Service;

interface IFlusher
{
    public function flush(): void;
}
