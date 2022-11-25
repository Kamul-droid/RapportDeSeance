<?php

namespace App\Form;

use App\Entity\FicheClient;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class FicheClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',\Symfony\Component\Form\Extension\Core\Type\TextType::class)
            ->add('date', DateTimeType::class,[
                "widget" => "single_text",
            ])
            ->add('acupuncture',
                CollectionType::class,
                [
                    'entry_type' => ProfilAcuMeridienType::class,
                    'allow_add'=>true,

                ]
            )


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheClient::class,
        ]);
    }
}
