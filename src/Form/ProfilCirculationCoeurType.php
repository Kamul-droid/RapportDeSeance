<?php

namespace App\Form;

use App\Entity\ProfilCirculationCoeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilCirculationCoeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('transfert')
            ->add('valves_arteres')
            ->add('choix_biospecifique')
            ->add('choix_item')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilCirculationCoeur::class,
        ]);
    }
}
