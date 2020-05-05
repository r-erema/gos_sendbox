<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller\Auth;

use other\ProjectManager\src\Controller\IndexController;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Confirm\Command as ConfirmCommand;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Confirm\Handler as ConfirmHandler;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Command;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Form;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Handler as RequestHandler;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

class SignInController extends AbstractController
{

    public const SIGN_IN_ROUTE = 'auth.login';
    public const LOGOUT_ROUTE = 'auth.logout';

    /**
     * @Route("/signin", name=SignInController::SIGN_IN_ROUTE)
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('app/auth/signin.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/logout", name=SignInController::LOGOUT_ROUTE, methods={"GET"})
     */
    public function logout(): Response
    {
        return new Response();
    }
}
