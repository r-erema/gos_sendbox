<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Controller;

use other\ProjectManager\src\Model\User\Repository\IUserRepository;
use other\ProjectManager\src\Security\UserIdentity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    public const READ_ROUTE = 'profile.read';

    private IUserRepository $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @Route("/profile", name=ProfileController::READ_ROUTE)
     * @return Response
     */
    public function show(): Response
    {
        /** @var UserIdentity $user */
        $user = $this->getUser();
        $user = $this->users->get($user->getId());
        return $this->render('app/profile/read.html.twig', compact('user'));
    }
}
