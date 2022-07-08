<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository)
    {
        $requestUser = json_decode($request->getContent(), false);
        $user = $userRepository->findOneBy(["email" => $requestUser->email]);

        if (!$user) {
            return new Response("User with email: " . $requestUser->email . " not found");
        }

        if (!$passwordHasher->isPasswordValid($user, $requestUser->password)) {
            return new Response("Password is not valid try again");
        }

        return new Response("Welcome");
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
