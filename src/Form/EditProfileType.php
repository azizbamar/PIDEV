<?php

namespace App\Form;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormError;

use App\Entity\User;
// EditProfileType.php



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
=======

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('cin', TextType::class)
=======
        ->add('cin')
         
           
          
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('address')
            ->add('phoneNumber')
<<<<<<< HEAD
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onSubmit']);
=======
        ;
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
<<<<<<< HEAD

    public function onSubmit(FormEvent $event): void
    {
        $user = $event->getData();
        // Check for null values and handle them accordingly
        if ($user->getCin() === null || $user->getFirstName() === null) {
            $event->getForm()->addError(new FormError('All fields are required.'));
        }
    }
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
}
