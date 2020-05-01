<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User;

interface IFlusher
{
    public function flush(): void;
}
