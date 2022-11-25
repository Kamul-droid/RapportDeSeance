<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>' Nom du patient ',
                'attr'=>['class'=>'form-control'],
                'mapped' => false,
            ])

            ->add('ProfilAcuMeridien',ProfilAcuMeridienType::class,[
                'label'=>' ProfilAcuMeridien ',
                'attr'=>['class'=>'form-control'],
                'mapped' => false,
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
