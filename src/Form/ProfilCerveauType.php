<?php

namespace App\Form;

use App\Entity\EquilibreHarmoniqueCerveauGaucheCerveauDroit;
use App\Entity\Meridien;
use App\Entity\ProfilCerveau;
use App\Entity\ReglageOndesCerebrales;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilCerveauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reglage_ondes_cerebrales',EntityType::class,[
                "class" => ReglageOndesCerebrales::class,
                "label" => "Reglages Ondes Cerebrales"
            ])
            ->add('ADD_')
            ->add('DHDA')
            ->add('equilibre_harmonique_cerveau_gauche_cerveau_droit',EntityType::class,[
                "class" => EquilibreHarmoniqueCerveauGaucheCerveauDroit::class,
                "label" => "Equilibre Harmonique Cerveau Gauche Cerveau Droit"])
            ->add('choix_item')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilCerveau::class,
        ]);
    }
}
