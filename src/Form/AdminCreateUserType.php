<?php
// src/Form/AdminCreateUserType.php

namespace App\Form;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Validator\Constraints\Length;
use App\Entity\User;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminCreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
<<<<<<< HEAD
=======
            ->add('password', PasswordType::class, [
                'mapped' => false,
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
            ])  // Note: Handle password encoding appropriately
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            ->add('firstName')
            ->add('lastName')
            ->add('cin')
            ->add('address')
            ->add('phoneNumber')

        // Fetch roles dynamically and add as choices
        
        ->add('roles', ChoiceType::class, [
            'choices' => [
                'Expert' => 'ROLE_EXPERT',
                'Pharmacist' => 'ROLE_PHARMACIST',
                'Doctor' => 'ROLE_DOCTOR',
                'Agent' => 'ROLE_AGENT',
<<<<<<< HEAD
                
=======
                'Sous Admin'=>'ROLE_SOUS_ADMIN',
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
                'Admin' => 'ROLE_ADMIN',
                'Super Admin' => 'ROLE_SUPER_ADMIN',

            ],
<<<<<<< HEAD
            'multiple' => false,
=======
            'multiple' => true,
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
            'expanded' => false,
            'required' => true,
        ]);

        // Fetch tables dynamically and add roles checkboxes
        // foreach ($options['tables'] as $tableName) {
        //     $builder
        //         ->add($tableName.'_create', CheckboxType::class, [
        //             'label' => 'Can Create',
        //             'required' => false,
        //             'mapped' => false,
        //         ])
        //         ->add($tableName.'_update', CheckboxType::class, [
        //             'label' => 'Can Update',
        //             'required' => false,
        //             'mapped' => false,
        //         ])
        //         ->add($tableName.'_delete', CheckboxType::class, [
        //             'label' => 'Can Delete',
        //             'required' => false,
        //             'mapped' => false,
        //         ])
        //         ->add($tableName.'_read', CheckboxType::class, [
        //             'label' => 'Can Read',
        //             'required' => false,
        //             'mapped' => false,
        //         ]);
        // }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'tables' => [],  // Pass the list of tables as an option
        ]);
    }
}

?>