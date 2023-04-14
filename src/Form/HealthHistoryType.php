<?php

namespace App\Form;

use App\Entity\HealthHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HealthHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('event',DateTimeType::class,["widget"=>"single_text",
        'label'=>'Date de l\'évènement ',
        'label_attr'=>[
            'style'=>'width:auto;',
            
        ]
        ])
        ->add('illness',TextType::class,[
            'label'=>'Maladies / médicaments / chocs / évènements associés',
            'label_attr'=>[
                'style'=>'width:auto;',
                
            ],
            'attr' => [
                'class' => '','placeholder'=>'informations','row'=>'5',
            
            ]
        ])
            ->add('descript',TextareaType::class,[
                 'attr' => [
                'class' => '','placeholder'=>'Autres informations','row'=>'5'
            
            ],
            'label'=>'Observation'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HealthHistory::class,
        ]);
    }
}
