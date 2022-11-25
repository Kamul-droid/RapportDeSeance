<?php

namespace App\Form;

use App\Entity\Meridien;
use App\Entity\ProfilRegistreSusceptibilite;
use App\Entity\RegistreDeSusceptibilite;
use App\Entity\Transfert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilRegistreSusceptibiliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('registre_de_susceptibilite',EntityType::class,[
        "class" => RegistreDeSusceptibilite::class,
        "label" => " Resgistre De Susceptibilite"
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
            'data_class' => ProfilRegistreSusceptibilite::class,
        ]);
    }
}
