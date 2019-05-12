<?php

declare(strict_types=1);

namespace learning\Architecture\Layered\Example1\Controllers;

use learning\Architecture\Layered\Example1\Model\Application\PostService,
    Psr\Http\Message\RequestInterface,
    learning\Architecture\Layered\Example1\Model\Exceptions\UnableToCreatePostException,
    Twig\Error\LoaderError,
    Twig\Error\RuntimeError,
    Twig\Error\SyntaxError,
    learning\Architecture\Layered\Example1\View\View;

class PostsController
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    private function render(string $template, array $variables = []): string
    {
        return $this->view->render($template, $variables);
    }

    /**
     * @param RequestInterface $request
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function updateAction(RequestInterface $request): string
    {

        try {
            $postService = new PostService();
            $data = json_decode($request->getBody()->getContents(), true);
            $post = $postService->createPost($data['title'], $data['content'],);
        } catch (UnableToCreatePostException $e) {
            return $e->getMessage();
        }

        return $this->render('post.html.twig', ['post' => $post]);
    }

}