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
use Symfony\Contracts\Translation\TranslatorInterface;

class SignUpController extends AbstractController
{

    public const SIGNUP_ROUTE = 'auth.signup';
    public const CONFIRM_ROUTE = 'auth.confirm';

    private LoggerInterface $logger;
    private TranslatorInterface $translator;

    public function __construct(LoggerInterface $logger, TranslatorInterface $translator)
    {
        $this->logger = $logger;
        $this->translator = $translator;
    }

    /**
     * @Route("/signup", name=SignUpController::SIGNUP_ROUTE)
     * @param Request $request
     * @param RequestHandler $handler
     * @return Response
     */
    public function request(Request $request, RequestHandler $handler): Response
    {
        $form = $this->createForm(Form::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                /** @var Command $command */
                $command = $form->getData();
                $handler->handle($command);
                $this->addFlash('success', $this->translator->trans('Check your email', [], 'common'));
                return $this->redirectToRoute(IndexController::INDEX_ROUTE);
            } catch (RuntimeException $e) {
                $this->logger->error($e->getMessage(), ['exception' => $e]);
                $this->addFlash('error', $this->translator->trans($e->getMessage(), [], 'exceptions'));
            }
        }

        return $this->render('app/auth/signup.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/confirm/{token}", name=SignUpController::CONFIRM_ROUTE)
     * @param string $token
     * @param ConfirmHandler $handler
     * @return Response
     */
    public function confirm(string $token, ConfirmHandler $handler): Response
    {
        $command = new ConfirmCommand($token);
        try {
            $handler->handle($command);
            $this->addFlash('success', $this->translator->trans('Email is successfully confirmed', [], 'common'));
            return $this->redirectToRoute(IndexController::INDEX_ROUTE);
        }  catch (RuntimeException $e) {
            $this->logger->error($e->getMessage(), ['exception' => $e]);
            $this->addFlash('error', $this->translator->trans($e->getMessage(), [], 'exceptions'));
            return $this->redirectToRoute(IndexController::INDEX_ROUTE);
        }
    }
}
