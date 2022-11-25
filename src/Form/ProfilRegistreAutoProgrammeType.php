<?php

namespace App\Form;

use App\Entity\Meridien;
use App\Entity\ProfilRegistreAutoProgramme;
use App\Entity\ProfilRegistreSusceptibilite;
use App\Entity\Transfert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilRegistreAutoProgrammeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('registre_susceptibilite',EntityType::class,[
                "class" => ProfilRegistreSusceptibilite::class,
                "label" => " Registre Susceptibilite "
            ])
            ->add('transfert',EntityType::class,[
        "class" => Transfert::class,
        "label" => " Transfert"
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilRegistreAutoProgramme::class,
        ]);
    }
}
