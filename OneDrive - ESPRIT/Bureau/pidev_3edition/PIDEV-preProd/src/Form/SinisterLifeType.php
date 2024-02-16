<?php

namespace App\Form;

use App\Entity\SinisterLife;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SinisterLifeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateSinister')
            ->add('location')
            ->add('amountSinister')
            ->add('statusSinister')
            ->add('description')
            ->add('beneficiaryName')
            ->add('sinisterUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SinisterLife::class,
        ]);
    }
}
