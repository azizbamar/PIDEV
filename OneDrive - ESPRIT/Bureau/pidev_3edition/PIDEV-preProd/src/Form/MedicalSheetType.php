<?php

namespace App\Form;

use App\Entity\MedicalSheet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicalSheetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('medicalDiagnosis')
            ->add('treatmentPlan')
            ->add('medicalReports')
            ->add('durationOfIncapacity')
            ->add('procedurePerformed')
            ->add('sickLeaveDuration')
            ->add('hospitalizationPeriod')
            ->add('rehabilitationPeriod')
            ->add('medicalInformation')
            ->add('clientCIN')
            ->add('sinisterLife')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MedicalSheet::class,
        ]);
    }
}
