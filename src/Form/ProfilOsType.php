<?php

namespace App\Form;

use App\Entity\ChoixBioSpecifique;
use App\Entity\Meridien;
use App\Entity\ProfilOs;
use App\Entity\Reduction;
use App\Entity\Transfert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilOsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('transfert',EntityType::class,[
                "class" => Transfert::class,
                "label" => " Transfert "
            ])
            ->add('choixBioSpecifique',EntityType::class,[
                "class" => ChoixBioSpecifique::class,
                "label" => "Choix Bio Specifique "
            ])
            ->add('reduction',EntityType::class,[
        "class" => Reduction::class,
        "label" => " Réduction "
    ])
            ->add('nom_os')
            ->add('liste_items')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilOs::class,
        ]);
    }
}
