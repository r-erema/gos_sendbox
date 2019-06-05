<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

interface PostRepository
{

    public function save(Post $post);
    public function byId(PostId $id);

}