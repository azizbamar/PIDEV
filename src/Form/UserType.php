<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Validator\Constraints\Length;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            // ->add('roles')
            ->add('firstName')
            ->add('lastName')
            ->add('cin')
            ->add('address')
            ->add('phoneNumber')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Expert' => 'ROLE_EXPERT',
                    'Pharmacist' => 'ROLE_PHARMACIST',
                    'Doctor' => 'ROLE_DOCTOR',
                    'Agent' => 'ROLE_AGENT',
                    'Sous Admin'=>'ROLE_SOUS_ADMIN',
                    'Admin' => 'ROLE_ADMIN',
                    'Super Admin' => 'ROLE_SUPER_ADMIN',
    
                ],
                'multiple' => true,
                'expanded' => false,
                // 'required' => true,
            ])
            ->add('password', PasswordType::class, [
              
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])

    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
