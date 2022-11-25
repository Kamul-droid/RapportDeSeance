<?php

namespace App\Form;

use App\Entity\ProfilRespiratoire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilRespiratoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('transfert')
            ->add('choix_bio_specifique')
            ->add('choix_items')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilRespiratoire::class,
        ]);
    }
}
