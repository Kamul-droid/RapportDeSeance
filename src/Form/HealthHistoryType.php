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
        'label'=>'Date de l\'évenement',
        ])
        ->add('illness',TextType::class,[
            'label'=>'Maladies, médicaments,chocs - évènements associés',
            'label_attr'=>[
                'class'=>'',
                
            ]
        ])
            ->add('descript',TextareaType::class,[ 'attr' => [
                'class' => 'form-control','placeholder'=>'Autres informations','row'=>'3'
            ],
            'label'=>'Description'
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
