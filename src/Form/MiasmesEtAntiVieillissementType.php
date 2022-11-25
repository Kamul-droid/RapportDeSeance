<?php

namespace App\Form;

use App\Entity\FacteursDeStress;
use App\Entity\FacteursGeneraux;
use App\Entity\FacteursMiasmatiques;
use App\Entity\Meridien;
use App\Entity\MiasmesEtAntiVieillissement;
use App\Entity\ReactionAge;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MiasmesEtAntiVieillissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('facteurs_miasmatiques',EntityType::class,[
                "class" => FacteursMiasmatiques::class,
                "label" => " Facteurs Miasmatiques "
            ])
            ->add('facteurs_de_stress',EntityType::class,[
                "class" => FacteursDeStress::class,
                "label" => "Facteurs De Stress "
            ])
            ->add('reaction_age',EntityType::class,[
                "class" => ReactionAge::class,
                "label" => " Reaction Age "
            ])
            ->add('facteurs_generaux',EntityType::class,[
                "class" => FacteursGeneraux::class,
                "label" => "Facteurs Generaux"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MiasmesEtAntiVieillissement::class,
        ]);
    }
}
