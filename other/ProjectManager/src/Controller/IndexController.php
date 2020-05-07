<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    public const INDEX_ROUTE = 'index';

    /**
     * @Route("/", name=IndexController::INDEX_ROUTE)
     */
    public function index(): Response
    {
        return $this->render('app/layout.html.twig');
    }

}
