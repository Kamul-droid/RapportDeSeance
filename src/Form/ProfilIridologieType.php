<?php

namespace App\Form;

use App\Entity\Meridien;
use App\Entity\ProfilIridologie;
use App\Entity\TableALanger;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilIridologieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('table_a_langer',EntityType::class,[
                "class" => TableALanger::class,
                "label" => " Table A Langer "
            ])
            ->add('commentaire')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilIridologie::class,
        ]);
    }
}
