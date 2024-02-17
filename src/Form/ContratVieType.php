<?php

namespace App\Form;
use App\Entity\LifeRequest;

use App\Entity\ContratVie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContratVieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Date_debut')
            ->add('Date_fin')
            ->add('Description')
            ->add('MatriculeAgent')
            ->add('request', EntityType::class, [
                           'class' => LifeRequest::class,
                           'choice_label' => 'id',
                       ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContratVie::class,
        ]);
    }
}
