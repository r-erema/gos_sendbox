<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Controllers;

class PostsController
{


    public function listAction(): array
    {
        return ['response'];
    }

}