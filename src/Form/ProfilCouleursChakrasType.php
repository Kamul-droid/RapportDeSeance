<?php

namespace App\Form;

use App\Entity\Chakra;
use App\Entity\Meridien;
use App\Entity\ProfilCouleursChakras;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilCouleursChakrasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('chakra',EntityType::class,[
                "class" => Chakra::class,
                "label" => " Chakras "
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilCouleursChakras::class,
        ]);
    }
}
