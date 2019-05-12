<?php

declare(strict_types=1);

namespace learning\Architecture\Layered\Example1\Model\Application;

use learning\Architecture\Layered\Example1\Model\Exceptions\UnableToCreatePostException,
    learning\Architecture\Layered\Example1\Model\Post,
    learning\Architecture\Layered\Example1\Model\PostRepository;

class PostService
{

    /**
     * @param string $title
     * @param string $content
     * @return Post
     * @throws UnableToCreatePostException
     */
    public function createPost(string $title, string $content): Post
    {
        $post = Post::writeNewFrom($title, $content);
        (new PostRepository())->add($post);
        return $post;
    }

}