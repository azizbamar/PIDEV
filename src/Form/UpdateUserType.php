<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UpdateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('cin')
        ->add('firstName')
        ->add('lastName')
        ->add('email')
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
            'required' => true,

        ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
