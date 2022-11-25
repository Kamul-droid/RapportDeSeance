<?php

namespace App\Form;

use App\Entity\Meridien;
use App\Entity\ProfilAcuMeridien;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilAcuMeridienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('meridien',EntityType::class,[
                "class" => Meridien::class,
                "label" => "Les méridiens"
            ])
            ->add('feedback')
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilAcuMeridien::class,
        ]);
    }
}
