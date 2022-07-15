<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class PartnerController extends AbstractController
{
    #[Route('/partners', name: 'partners')]
    public function index(): Response
    {
        return $this->render('front/partners/index.html.twig');
    }

    #[Route('/partners/login', name: 'login_patners')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(RegistrationFormType::class, new User());


        return $this->render('front/partners/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error,
            'form' => $form->createView()

        ]);
    }
}
