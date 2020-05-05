<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller\Auth;

use other\ProjectManager\src\Controller\IndexController;
use other\ProjectManager\src\Infrastructure\Exception\EntityNotFoundException;
use other\ProjectManager\src\Model\User\UseCase\Reset\Request\Command;
use other\ProjectManager\src\Model\User\UseCase\Reset\Request\Form as RequestForm;
use other\ProjectManager\src\Model\User\UseCase\Reset\Request\Handler;
use other\ProjectManager\src\Model\User\UseCase\Reset\Reset\Command as ResetCommand;
use other\ProjectManager\src\Model\User\UseCase\Reset\Reset\Form as ResetForm;
use other\ProjectManager\src\Model\User\UseCase\Reset\Reset\Handler as ResetHandler;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ResetController extends AbstractController
{

    public const RESET_REQUEST_ROUTE = 'auth.reset.request';
    public const RESET_RESET_ROUTE = 'auth.reset.reset';

    private LoggerInterface $logger;
    private TranslatorInterface $translator;

    public function __construct(LoggerInterface $logger, TranslatorInterface $translator)
    {
        $this->logger = $logger;
        $this->translator = $translator;
    }

    /**
     * @Route("/reset", name=ResetController::RESET_REQUEST_ROUTE)
     * @param Request $request
     * @param Handler $handler
     * @return Response
     * @throws EntityNotFoundException
     */
    public function request(Request $request, Handler $handler): Response
    {
        $form = $this->createForm(RequestForm::class);
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

        return $this->render('app/auth/reset_request.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/reset/{token}", name=ResetController::RESET_RESET_ROUTE)
     * @param string $token
     * @param Request $request
     * @param ResetHandler $handler
     * @return Response
     */
    public function reset(string $token, Request $request, ResetHandler $handler): Response
    {
        $form = $this->createForm(ResetForm::class, null, ['token' => $token]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                /** @var ResetCommand $command */
                $command = $form->getData();
                $handler->handle($command);
                $this->addFlash('success', $this->translator->trans('Password is successfully changed', [], 'common'));
                return $this->redirectToRoute(IndexController::INDEX_ROUTE);
            } catch (RuntimeException $e) {
                $this->logger->error($e->getMessage(), ['exception' => $e]);
                $this->addFlash('error', $this->translator->trans($e->getMessage(), [], 'exceptions'));
            }
        }

        return $this->render('app/auth/reset_reset.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
