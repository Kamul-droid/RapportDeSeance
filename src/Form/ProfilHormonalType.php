<?php

namespace App\Form;

use App\Entity\BalanceHormonaleFemelle;
use App\Entity\Meridien;
use App\Entity\ProfilHormonal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilHormonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('balance_hormonale_femelle',EntityType::class,[
                "class" => BalanceHormonaleFemelle::class,
                "label" => " Balance Hormonale Femellle"
            ])
            ->add('balance_hormonale_male',EntityType::class,[
        "class" => BalanceHormonaleFemelle::class,
        "label" => "Balance Hormonale Male"
    ])
            ->add('glandes_hormones')
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilHormonal::class,
        ]);
    }
}
