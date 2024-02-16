<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

use App\Form\UpdateUserType;
use App\Form\EditProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\ChangePasswordType;

class ProfileController extends AbstractController
{
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = $this->getUser();
        $changePwdForm = $this->createForm(ChangePasswordType::class);


        $changePwdForm->handleRequest($request);

        if ($changePwdForm->isSubmitted() && $changePwdForm->isValid()) {
            $data = $changePwdForm->getData();

            // Check if the current password is correct
            if (!$passwordEncoder->isPasswordValid($user, $data['currentPassword'])) {
         
                $this->addFlash('danger', 'Incorrect current password.');
                return $this->redirectToRoute('users-profile');
            }

            // Set the new password
            $encodedPassword = $passwordEncoder->encodePassword($user, $data['newPassword']);
            if ($user instanceof \App\Entity\User) {

            $user->setPassword($encodedPassword);
            
        }

            // Save the updated user entity
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

             $this->addFlash('success', 'Password updated successfully.');

             return $this->redirectToRoute('users-profile'); // Redirect to the profile page or any other page you prefer
        }
        $form = $this->createForm(EditProfileType::class, $this->getUser());

        return $this->render('user/users-profile.html.twig', [
            'changePwdForm' => $changePwdForm->createView(),
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ]);
        // return $this->json(["user"=>$user]);
    }
    // #[Route('/profile', name: 'app_profile')]
    public function usersProfile(): Response
    {
        $changePwdForm = $this->createForm(ChangePasswordType::class);

        $form = $this->createForm(EditProfileType::class, $this->getUser());
        return $this->render('user/users-profile.html.twig', [
            'controller_name' => 'ProfileController',
            'form'=>$form->createView(),
            'action'=>'false',
            'user'=>$this->getUser(),
            'changePwdForm'=>$changePwdForm->createView()

        ]);
    }
    public function editprofile(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EditProfileType::class, $this->getUser());
        $form->handleRequest($request);
        if ($this->getUser() instanceof \App\Entity\User) {
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'User updated successfully.');

            return $this->redirectToRoute('users-profile', [], Response::HTTP_SEE_OTHER);
        }
        
        $changePwdForm = $this->createForm(ChangePasswordType::class);



        return $this->render('user/users-profile.html.twig', [
            'form'=>$form->createView(),
            'action'=>'false',
            'user'=>$this->getUser(),
            'changePwdForm'=>$changePwdForm->createView()
            
        ]);
    

}
else {
    $this->addFlash('error', 'Error has been Occured');
}
}
public function profile(){
    $changePwdForm = $this->createForm(ChangePasswordType::class);
    $form = $this->createForm(EditProfileType::class, $this->getUser());

    return $this->render('profile/index.html.twig', [
        'form'=>$form->createView(),
        'action'=>'false',
        'user'=>$this->getUser(),
        'changePwdForm'=>$changePwdForm->createView()
        
    ]);
}


}
