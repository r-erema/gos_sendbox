<?php

declare(strict_types=1);

namespace learning\Architecture\Hexagonal\Example2\Domain\Services;

use learning\Architecture\Hexagonal\Example2\Domain\Entities\Post,
    learning\Architecture\Hexagonal\Example2\Domain\Ports\PostRepository;

class PostService
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost(string $title, string $content): Post
    {
        $post = Post::writeNewFrom($title, $content);
        $this->postRepository->add($post);
        return $post;
    }

}