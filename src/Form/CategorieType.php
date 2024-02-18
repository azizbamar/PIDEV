<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('title', TextType::class, [
            'label' => 'Title',
            'attr' => ['placeholder' => 'Enter article title'],
        ])
            ->add('date_pub', DateType::class, [
                'label' => 'Publication Date',
                'widget' => 'single_text',
                'attr' => ['placeholder' => 'Choose publication date'],
            ])
            ->add('article_url', UrlType::class, [
                'label' => 'Article URL',
                'attr' => ['placeholder' => 'Enter article URL'],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Enter article description'],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'attr' => ['placeholder' => 'Choose article image'],
                'mapped' => false, // Don't map this field to any property on your entity
                'required' => false, // Image upload is optional
            ])
            ->add('author_name', TextType::class, [
                'label' => 'Author Name',
                'attr' => ['placeholder' => 'Enter author name'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
