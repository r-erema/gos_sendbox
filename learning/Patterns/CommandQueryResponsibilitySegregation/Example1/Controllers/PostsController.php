<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Controllers;


use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories\PostRepository;

class PostsController
{

    private $postRepository;

    public function __construct(PostRepository $repository)
    {
        $this->postRepository = $repository;
    }

    public function createPost(string $title, string $content): void
    {
        $post = Post::writeNewFrom($title, $content);
        $this->postRepository->save($post);
    }

}