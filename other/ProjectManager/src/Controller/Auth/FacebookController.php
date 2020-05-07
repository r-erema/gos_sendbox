<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller\Auth;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use other\ProjectManager\src\Controller\IndexController;
use Predis\ClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookController extends AbstractController
{

    public const CONNECT_ROUTE = 'oauth.facebook_connect';
    public const CHECK_ROUTE = 'oauth.facebook_check';

    /**
     * @Route("/oauth/facebook", name=FacebookController::CONNECT_ROUTE)
     * @param ClientRegistry $clientRegistry
     * @return Response
     */
    public function connect(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry->getClient('facebook')->redirect(['public_profile'], []);
    }
    /**
     * @Route("/oauth/facebook/check", name=FacebookController::CHECK_ROUTE)
     */
    public function check(): Response
    {
        return $this->redirectToRoute(IndexController::INDEX_ROUTE);
    }

}
