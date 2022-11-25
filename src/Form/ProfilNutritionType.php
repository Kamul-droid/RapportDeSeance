<?php

namespace App\Form;

use App\Entity\AcidesAmines;
use App\Entity\Meridien;
use App\Entity\Mineraux;
use App\Entity\ProfilNutrition;
use App\Entity\Vitamines;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilNutritionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mineraux',EntityType::class,[
                "class" => Mineraux::class,
                "label" => "Les minéraux"
            ])
            ->add('acides_amines',EntityType::class,[
        "class" => AcidesAmines::class,
        "label" => "Les acides aminés"
    ])
            ->add('vitamines',EntityType::class,[
                "class" => Vitamines::class,
                "label" => "Les vitamines"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilNutrition::class,
        ]);
    }
}
