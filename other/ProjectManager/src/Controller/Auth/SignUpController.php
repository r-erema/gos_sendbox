<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller\Auth;

use DomainException;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Command;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Form;
use other\ProjectManager\src\Model\User\UseCase\SignUp\Request\Handler;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignUpController extends AbstractController
{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @Route("/signup", name="auth.signup")
     */
    public function request(Request $request, Handler $handler): Response
    {
        $form = $this->createForm(Form::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                /** @var Command $command */
                $command = $form->getData();
                $handler->handle($command);
                $this->addFlash('success', 'Check your email');
                $this->redirectToRoute('home');
            } catch (DomainException $e) {
                $this->logger->error($e->getMessage(), ['exception' => $e]);
                $this->addFlash('error', $e->getMessage());
            }
        }

        return $this->render('app/auth/signup.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
