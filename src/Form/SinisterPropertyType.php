<?php

namespace App\Form;

use App\Entity\SinisterProperty;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SinisterPropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateSinister', DateType::class, [
            'widget' => 'single_text',
            'html5' => false,
            'format' => 'yyyy-MM-dd',
            'constraints' => [
                new Assert\NotBlank(['message' => 'La date ne doit pas être vide.']),
            ],
            'placeholder' => 'Sélectionnez une date',
        ])
        ->add('location')
        ->add('type_degat', ChoiceType::class, [
            'choices' => [
                'cambriolé' => 'cambriolé',
                'incendié' => 'incendié',
                'inondé' => 'inondé',
            ],
            'placeholder' => 'Sélectionnez un type de dégât', 
            
        ])
            ->add('description_degat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SinisterProperty::class,
        ]);
    }
}
