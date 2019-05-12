<?php

declare(strict_types=1);

namespace learning\Architecture\Hexagonal\Example2\Domain\Ports;

use learning\Architecture\Hexagonal\Example2\Domain\Entities\Post;
use learning\Architecture\Hexagonal\Example2\Domain\Entities\PostId;

interface PostRepository
{

    public function byId(PostId $id): Post;

    public function add(Post $post): void;

}