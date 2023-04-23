<?php

namespace App\Controller;

use App\Entity\Adherent;
use App\Form\NewPasswdFormType;
use App\Repository\AdherentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, AdherentRepository $adherentRepository): Response
    {
        if ($this->getUser()) {
             return $this->redirectToRoute('app_compte', ['id' => $adherentRepository->findOneBy(['email' => $this->getUser()->getUserIdentifier()])->getId()]);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig', ['error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/compte/{id}', name: 'app_compte', requirements: ['id' => '\d+'])]
    public function compte(Adherent $adherent, Request $request, UserPasswordHasherInterface $userPasswordHasher, AdherentRepository $adherentRepository): Response
    {

        $form = $this->createForm(NewPasswdFormType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Check if the passwords match
            if ($form->get('plainPassword')->getData() !== $form->get('confirmPassword')->getData()) {
                $this->addFlash('error', 'Passwords do not match');
                return $this->redirectToRoute('app_compte', ['id' => $adherent->getId(), 'form' => $form->createView()]);
            }

            $adherent->setPassword($userPasswordHasher->hashPassword($adherent, $form->get('plainPassword')->getData()));

            $adherentRepository->upgradePassword($adherent, $adherent->getPassword());

            return $this->redirectToRoute('app_logout');
        }

        return $this->render('security/compte.html.twig', [
            'adherent' => $adherent,
            'form' => $form->createView(),
        ]);
    }
}
