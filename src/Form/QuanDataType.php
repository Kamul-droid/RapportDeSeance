<?php

namespace App\Form;

use App\Entity\QuanData;
use App\Entity\Quanfield;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class QuanDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('quanfield',EntityType::class,[
            'class'=>Quanfield::class,
                'label' => 'Module',
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'',
                ],
            
        ])
            ->add('picto',ChoiceType::class,[
                'label'=>'Pictogramme',
                'choices' => [
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5',
                    '6'=>'6',
                   
                ],
               
            ])
            ->add('disease',TextType::class,[
                'label'=>'Maladies',
            ])
            ->add('microBact',TextType::class,[
                'label'=>'Microbes / Bactéries',
            ])
            ->add('emotionConflit',TextType::class,[
                'label'=>'Emotionnel / conflits',
            ])
            ->add('mt',TextType::class,[
                'label'=>'Metathérapie',
            ])
            ->add('incDec',TextType::class,[
                'label'=>'Amélioration / Affaiblissement',
            ])
            ->add('vgt',TextType::class,[
                'label'=>'Vegetotest',
            ])
            ->add('med',TextType::class,[
                'label'=>'Medicament',
            ])
            ->add('observation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuanData::class,
        ]);
    }
}
