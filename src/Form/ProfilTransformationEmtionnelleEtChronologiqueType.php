<?php

namespace App\Form;

use App\Entity\ChoixDeFeedback;
use App\Entity\ChoixDeVoies;
use App\Entity\ChoixSolution;
use App\Entity\ChronologieDesFacteurs;
use App\Entity\FacteursDeStressConflictuel;
use App\Entity\FacteursDeStressEmotionnel;
use App\Entity\FacteursDeStressRelationnel;
use App\Entity\Meridien;
use App\Entity\ProfilTransformationEmtionnelleEtChronologique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilTransformationEmtionnelleEtChronologiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choix_de_voies',EntityType::class,[
                "class" => ChoixDeVoies::class,
                "label" => "Choix De Voies"])
            ->add('facteurs_de_stress_emotionnel',EntityType::class,[
                "class" => FacteursDeStressEmotionnel::class,
                "label" => "Facteurs De Stress Emotionnel"])
            ->add('facteurs_de_stress_conflictuel',EntityType::class,[
                "class" => FacteursDeStressConflictuel::class,
                "label" => "Facteurs De Stress Conflictuel"])
            ->add('choix_de_feedback',EntityType::class,[
                "class" => ChoixDeFeedback::class,
                "label" => "Choix De Feedback"])
            ->add('choix_solution',EntityType::class,[
                "class" => ChoixSolution::class,
                "label" => "Choix Solution"])
            ->add('facteurs_de_stress_relationnel',EntityType::class,[
                "class" => FacteursDeStressRelationnel::class,
                "label" => "Facteurs De Stress Relationnel"])
            ->add('chronologie_de_facteurs',EntityType::class,[
                "class" => ChronologieDesFacteurs::class,
                "label" => "Chronologie De Facteurs"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilTransformationEmtionnelleEtChronologique::class,
        ]);
    }
}
