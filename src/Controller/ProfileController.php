<?php

namespace App\Controller;
<<<<<<< HEAD
use Symfony\Component\Validator\Exception\ValidatorException;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Security;
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
<<<<<<< HEAD
=======

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
use App\Form\UpdateUserType;
use App\Form\EditProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\ChangePasswordType;
<<<<<<< HEAD
use App\Form\ProfilePictureType;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProfileController extends AbstractController
{
public FlashyNotifier $flashy;
    public function __construct(FlashyNotifier $flashy)
    {
        $this->flashy = $flashy;
    }


    public function changePassword(FlashyNotifier $flashy,Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $editPictureform = $this->createForm(ProfilePictureType::class);

=======

class ProfileController extends AbstractController
{
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
        $user = $this->getUser();
        $changePwdForm = $this->createForm(ChangePasswordType::class);


        $changePwdForm->handleRequest($request);
<<<<<<< HEAD
            if ($changePwdForm->isSubmitted() && !$changePwdForm->isValid()) {
            foreach ($changePwdForm->getErrors(true) as $error) {
                $this->addFlash('danger', $error->getMessage());
            return $this->redirectToRoute('profile'); // Replace 'your_redirect_route' with your actual route

            }
        }
        if ($changePwdForm->isSubmitted() && $changePwdForm->isValid()) {
            $data = $changePwdForm->getData();
            if($data['newPassword'] != $data['renewPassword']){
                $this->addFlash('danger', 'The passwords do not match.');
                return $this->redirectToRoute('profile');
            }
=======

        if ($changePwdForm->isSubmitted() && $changePwdForm->isValid()) {
            $data = $changePwdForm->getData();

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            // Check if the current password is correct
            if (!$passwordEncoder->isPasswordValid($user, $data['currentPassword'])) {
         
                $this->addFlash('danger', 'Incorrect current password.');
<<<<<<< HEAD
                return $this->redirectToRoute('profile');
=======
                return $this->redirectToRoute('users-profile');
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
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
<<<<<<< HEAD
            $flashy->success('Password updated successfully');

            //  $this->addFlash('success', 'Password updated successfully.');

             return $this->redirectToRoute('profile'); // Redirect to the profile page or any other page you prefer
        }
        $form = $this->createForm(EditProfileType::class, $this->getUser());

        return $this->render('profile/index.html.twig', [
            'editPictureform'=>$editPictureform->createView(),
=======

             $this->addFlash('success', 'Password updated successfully.');

             return $this->redirectToRoute('users-profile'); // Redirect to the profile page or any other page you prefer
        }
        $form = $this->createForm(EditProfileType::class, $this->getUser());

        return $this->render('user/users-profile.html.twig', [
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            'changePwdForm' => $changePwdForm->createView(),
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ]);
<<<<<<< HEAD
    }
   public function abc(){
    
   }
    public function usersProfile(): Response
    {
        $editPictureform = $this->createForm(ProfilePictureType::class);

        $changePwdForm = $this->createForm(ChangePasswordType::class);

        $form = $this->createForm(EditProfileType::class, $this->getUser());
        return $this->render('profile/index.html.twig', [
            'editPictureform'=>$editPictureform->createView(),

=======
        // return $this->json(["user"=>$user]);
    }
    // #[Route('/profile', name: 'app_profile')]
    public function usersProfile(): Response
    {
        $changePwdForm = $this->createForm(ChangePasswordType::class);

        $form = $this->createForm(EditProfileType::class, $this->getUser());
        return $this->render('user/users-profile.html.twig', [
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            'controller_name' => 'ProfileController',
            'form'=>$form->createView(),
            'action'=>'false',
            'user'=>$this->getUser(),
            'changePwdForm'=>$changePwdForm->createView()

        ]);
    }
<<<<<<< HEAD
    public function editprofile(FlashyNotifier $flashy,Request $request, EntityManagerInterface $entityManager): Response
{
    $editPictureform = $this->createForm(ProfilePictureType::class);

    $form = $this->createForm(EditProfileType::class, $this->getUser());
    $form->handleRequest($request);

    try {
        if ($this->getUser() instanceof User) {
            if ($form->isSubmitted() && !$form->isValid()) {
                foreach ($form->getErrors(true) as $error) {
                    // Get the error message and add it to the flash message
                    $this->addFlash('danger', $error->getMessage());
                }

                // Redirect outside of the loop
                return $this->redirectToRoute('profile');
            }

            if ($form->isSubmitted() && $form->isValid()) {
                // Explicitly check for null values in the form data
                $formData = $form->getData();
                if ($formData->getCin() === null || $formData->getFirstName() === null) {
                    $this->addFlash('danger', 'All fields are required.');
                    return $this->redirectToRoute('profile');
                }

                // If no null values, proceed with updating the user
                $entityManager->flush();
                $flashy->success('profile updated successfully');
                // $this->addFlash('success', 'User updated successfully.');
                return $this->redirectToRoute('profile', [], Response::HTTP_SEE_OTHER);
            }
        }
    } catch (ValidatorException $exception) {
        // Handle validation exception
        $this->addFlash('danger', $exception->getMessage());
    } catch (\Exception $exception) {
        // Handle other exceptions
        $this->addFlash('danger', 'An error occurred while updating the user.');
    }

    $changePwdForm = $this->createForm(ChangePasswordType::class);

    return $this->render('profile/index.html.twig', [
        'editPictureform'=>$editPictureform->createView(),

        'form' => $form->createView(),
        'action' => 'false',
        'user' => $this->getUser(),
        'changePwdForm' => $changePwdForm->createView(),
    ]);
}



#[Route('/change_profile_picture', name: 'change_profile_picture')]
public function changeProfilePicture(Request $request, Security $security): Response
{
    $changePwdForm = $this->createForm(ChangePasswordType::class);
    $form = $this->createForm(EditProfileType::class, $this->getUser());

    $user = $security->getUser();
    $editPictureform = $this->createForm(ProfilePictureType::class);
    $editPictureform->handleRequest($request);

    if ($editPictureform->isSubmitted() && $editPictureform->isValid() ) {

        $file = $editPictureform->get('imageFileName')->getData();
      
        $uuid = Uuid::uuid4();
        $fileName = $uuid->toString().'.'.$file->guessExtension();
        
        // Move the file to the directory where profile pictures are stored
        // Update user's profile picture
        if ($user instanceof User){
            $oldFilePath = $this->getParameter('photo_dir').'/'.$user->getImageFileName();

            // If the user already has a profile picture, delete the old one
            if ($user->getImageFileName() && file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        $file->move($this->getParameter('photo_dir'), $fileName);

            $user->setImageFileName($fileName); // Assuming you have a property like `profilePicture` in your User entity

        }

        $this->getDoctrine()->getManager()->flush();

        $this->addFlash('success', 'Profile picture updated successfully');
        return $this->redirectToRoute('profile', [], Response::HTTP_SEE_OTHER);

    }

    return $this->render('profile/index.html.twig', [
        'editPictureform'=>$editPictureform->createView(),
        'form'=>$form->createView(),

        'action'=>'false',
        'user'=>$this->getUser(),
        'changePwdForm'=>$changePwdForm->createView()
        
    ]);
}

public function profile(Request $request ,Security $security,SessionInterface $session){
    if ($request->getSession()->get('2fa_authenticated')) {
        // Manually set the session variable to false
        $session->set('2fa_authenticated', false);

        // Manually clear the user's security token
        $this->get('security.token_storage')->setToken(null);

        // Redirect to the logout route, which will handle the logout and then redirect to login
        return $this->redirectToRoute('app_logout');
    }
    $editPictureform = $this->createForm(ProfilePictureType::class);

=======
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
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    $changePwdForm = $this->createForm(ChangePasswordType::class);
    $form = $this->createForm(EditProfileType::class, $this->getUser());

    return $this->render('profile/index.html.twig', [
<<<<<<< HEAD
        'editPictureform'=>$editPictureform->createView(),

        'form'=>$form->createView(),
        'action'=>'false',
        'user'=>$this->getUser(),
        'changePwdForm'=>$changePwdForm->createView()
        
    ]);
}
public function adminprofile(SessionInterface $session,Request $request){
    if ($request->getSession()->get('2fa_authenticated')) {
        // Manually set the session variable to false
        $session->set('2fa_authenticated', false);

        // Manually clear the user's security token
        $this->get('security.token_storage')->setToken(null);

        // Redirect to the logout route, which will handle the logout and then redirect to login
        return $this->redirectToRoute('app_logout');
    }
    $editPictureform = $this->createForm(ProfilePictureType::class);

    $changePwdForm = $this->createForm(ChangePasswordType::class);
    $form = $this->createForm(EditProfileType::class, $this->getUser());

    return $this->render('profile/index2.html.twig', [
        'editPictureform'=>$editPictureform->createView(),

=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
        'form'=>$form->createView(),
        'action'=>'false',
        'user'=>$this->getUser(),
        'changePwdForm'=>$changePwdForm->createView()
        
    ]);
}


}
