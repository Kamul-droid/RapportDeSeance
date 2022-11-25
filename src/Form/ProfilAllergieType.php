<?php

namespace App\Form;

use App\Entity\Feedbacksupplementaire;
use App\Entity\Meridien;
use App\Entity\ProfilAllergie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilAllergieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commentaire')
            ->add('nom_item')
            ->add('feedbacksupplementaire',EntityType::class,[
                "class" => Feedbacksupplementaire::class,
                "label" => "FeedBackSupplementaire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilAllergie::class,
        ]);
    }
}
