<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;

interface PostRepository
{

    public function save(Post $post): void;
    public function byId(PostId $id): ?Post;

}