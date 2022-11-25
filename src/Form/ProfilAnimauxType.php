<?php

namespace App\Form;

use App\Entity\AnimauxFamilles;
use App\Entity\Meridien;
use App\Entity\ProfilAnimaux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilAnimauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('animaux_familles',EntityType::class,[
                "class" => AnimauxFamilles::class,
                "label" => "Les méridiens"
            ])
            ->add('feedback')
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilAnimaux::class,
        ]);
    }
}
