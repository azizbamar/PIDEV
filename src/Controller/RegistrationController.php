<?php

namespace App\Controller;

use App\Entity\User;
<<<<<<< HEAD
use App\Service\EmailService;

=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
<<<<<<< HEAD
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager,EmailService $emailService): Response
=======
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class,$user);
        $form->handleRequest($request);
        
<<<<<<< HEAD
        if ($form->isSubmitted() && !$form->isValid()) {
           
              
                $this->addFlash('danger', 'Error has been occured');

            
        }
      
=======
        
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
