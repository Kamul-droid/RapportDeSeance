<?php

namespace App\Form;

use App\Entity\DetoxDuCorps;
use App\Entity\FacteursDeStressPersonnelEtAutoInduit;
use App\Entity\Meridien;
use App\Entity\PathogenesEtAutresSubstancesToxiques;
use App\Entity\ProfilDetoxEtStressMultiples;
use App\Entity\ToxinesEnvironnementalesEtIndustrielles;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilDetoxEtStressMultiplesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('toxines_environnementales_et_industrielles',EntityType::class,[
                "class" => ToxinesEnvironnementalesEtIndustrielles::class,
                "label" => " Toxines Environnementales Et Industrielles"
            ])
            ->add('pathogenes_et_autres_substances_toxiques',EntityType::class,[
                "class" => PathogenesEtAutresSubstancesToxiques::class,
                "label" => "Pathogenes Et Autres Substances Toxiques"
            ])
            ->add('facteurs_de_stress_personnel_et_auto_induit',EntityType::class,[
                "class" => FacteursDeStressPersonnelEtAutoInduit::class,
                "label" => "Facteurs De Stress Personnels Et Auto Induit "
            ])
            ->add('detox_du_corps',EntityType::class,[
                "class" => DetoxDuCorps::class,
                "label" => "Detox Du Corps"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilDetoxEtStressMultiples::class,
        ]);
    }
}
