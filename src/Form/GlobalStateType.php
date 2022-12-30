<?php

namespace App\Form;

use App\Entity\GlobalState;
use App\Entity\GlobalDescription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GlobalStateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descript',EntityType::class,[
                'class'=>GlobalDescription::class,
                'label' => 'Malaise',
                'choice_label' => 'subject',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Saisir le motif secondaire',
                ],
            ])
            ->add('since',DateTimeType::class,['widget'=>'single_text',
            'label'=>'Depuis',
            ])
            ->add('duration',ChoiceType::class,[
                'label'=>'Durée',
                'choices' => [
                    '0/3 mois'=>'0/3 mois',
                    '0/6 mois'=>'0/6 mois',
                    '+6 mois'=>'+6 mois',
                   
                   
                ],
                // 'label_attr'=>[
                //     'class'=>'form-control',
                    
                // ]
            ])
            ->add('observation',TextareaType::class,[
                'attr'=>['class'=>'form-control', 'row'=>'5']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GlobalState::class,
        ]);
    }
}
