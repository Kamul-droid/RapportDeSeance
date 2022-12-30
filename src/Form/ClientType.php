<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class)
            ->add('surname')
            ->add('dateofbirth',DateTimeType::class,["widget"=>"single_text"])
            ->add('placeofbirth')
            ->add('s_group',ChoiceType::class,[
                'label'=>'Type de séance',
                'choices' => [
                    'O +'=>'O +',
                    'O -'=>'O -',
                    'A +'=>'A +',
                    'A -'=>'A -',
                    'B +'=>'B +',
                    'AB +'=>'AB +',
                    'AB -'=>'AB -',
                    'Inconnu'=>'Inconnu',
                ],
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
            ->add('hand',ChoiceType::class,[
                'label'=>'Type de séance',
                'choices' => [
                    'Gaucher'=>'Gaucher',
                    'Droitier'=>'Droitier',
                   
                ],
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
            ->add('work')
            ->add('tel')
            ->add('email')
            ->add('address')
            ->add('postalcode')
            ->add('country')
            ->add('sex',ChoiceType::class,[
                'label'=>'Sexe',
                'choices' => [
                    'Homme'=>'Homme',
                    'Femme'=>'Femme',
                   
                ],
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
            ->add('children')
            ->add('children_sex')
            ->add('maried',ChoiceType::class,[
                'label'=>'Situation matrimoniale',
                'choices' => [
                    'Célibataire'=>'Célibataire',
                    'Marié'=>'Marié',
                    'Divorcé'=>'Divorcé',
                   
                ],
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
