<?php

namespace App\Form;

use App\Entity\ConseilEvaluationPourAutoEvaluation;
use App\Entity\Meridien;
use App\Entity\ProfilNeuroEmotionnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilNeuroEmotionnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('conseil_evaluation_pour_auto_evaluation',EntityType::class,[
                "class" => ConseilEvaluationPourAutoEvaluation::class,
                "label" => "Conseil Evaluation Pour Auto Evaluation"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilNeuroEmotionnel::class,
        ]);
    }
}
