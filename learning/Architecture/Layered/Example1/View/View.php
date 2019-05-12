<?php

declare(strict_types=1);

namespace learning\Architecture\Layered\Example1\View;

use Twig\Environment,
    Twig\Loader\FilesystemLoader,
    Twig\Error\LoaderError,
    Twig\Error\RuntimeError,
    Twig\Error\SyntaxError;

class View
{

    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/Templates');
        $this->twig = new Environment($loader);
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $template, array $variables = []): string
    {
        return $this->twig->render($template, $variables);
    }
}