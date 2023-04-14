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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
                    'class' => 'form-control','placeholder'=>'Name',
                ],
            
        ])
            ->add('picto',ChoiceType::class,[
                'label'=>'Pictogramme',
                'choices' => [
                    'Pictogramme 1'=>'1',
                    
                    'Pictogramme 2'=>'2',
                    'Pictogramme 3'=>'3',
                    'Pictogramme 4'=>'4',
                    'Pictogramme 5'=>'5',
                    'Pictogramme 6'=>'6',
                   
                ],
               
            ])
            ->add('disease',TextType::class,[
                'label'=>'Maladies',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Maladies',
                ],
            ])
            ->add('microBact',TextType::class,[
                'label'=>'Microbes / Bactéries',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Microbes / Bactéries',
                ],
                'label_attr'=>[
                    'style'=>'width:auto;',
                    
                ]
            ])
            ->add('emotionConflit',TextType::class,[
                'label'=>'Emotionnel / conflits',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Emotionnel / conflits',
                ],
                'label_attr'=>[
                    'style'=>'width:auto;',
                    
                ]
            ])
            ->add('mt',TextType::class,[
                'label'=>'Metathérapie',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Metathérapie',
                ],
            ])
            ->add('incDec',TextType::class,[
                'label'=>'Amélioration / Affaiblissement',
                'attr' => [
                    'class' => '','placeholder'=>'Amélioration / Affaiblissement',
                ],
                'label_attr'=>[
                    'style'=>'width:auto;',
                    
                ]
            ])
            ->add('vgt',TextType::class,[
                'label'=>'Vegetotest',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Vegetotest',
                ],
            ])
            ->add('med',TextType::class,[
                'label'=>'Medicament',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Medicament',
                ],
            ])
            ->add('observation',TextareaType::class,[
                'attr'=>[
                    'rows'=>5,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuanData::class,
        ]);
    }
}
