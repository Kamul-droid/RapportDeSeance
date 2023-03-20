<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Quanfield;
use App\Form\QuanDataType;
use App\Entity\GlobalState;
use App\Entity\Quantareport;
use App\Entity\HealthHistory;
use App\Entity\PrimaryObject;
use App\Form\GlobalStateType;
use App\Entity\SecondaryObject;
use App\Form\HealthHistoryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QuantareportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('consult_method',ChoiceType::class,[
                'label'=>'Type de séance',
                'choices' => [
                    'Presentiel'=>'Présentiel',
                    'Metaespace'=>'Metaespace',
                   
                ],
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
            ->add('started_at',DateTimeType::class,["widget"=>"single_text"])
            ->add('ended_at',DateTimeType::class,["widget"=>"single_text"])
            ->add('soundplay',TextType::class,[
                'label'=>'Musique',
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ]
            ])
            ->add('client',EntityType::class,[
                'class'=>Client::class,
                'label' => 'Le client',
                'choice_label' => function($client){
                    return $client->getName().' '.$client->getSurname();
                },
                'attr' => [
                    'class' => 'form-control','placeholder'=>'le nom du client',
                ],
            ])
            ->add('pobject',EntityType::class,[
                'class'=>PrimaryObject::class,
                'label' => 'Motif de base',
                'choice_label' => 'value',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Saisir le motif de base pour la consultation',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('sobject',EntityType::class,[
                'class'=>SecondaryObject::class,
                'label' => 'Motif secondaire',
                'choice_label' => 'subject',
                'attr' => [
                    'class' => 'form-control','placeholder'=>'Saisir le motif secondaire',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('gstate',
            CollectionType::class,
            [
                'entry_type' => GlobalStateType::class,
                'allow_add'=>true,
                'label'=>'Etat général'

            ]
            )
            ->add('health',
            CollectionType::class,
            [
                'entry_type' => HealthHistoryType::class,
                'allow_add'=>true,
                'label'=>'Historique de santé'

            ]
            )
            ->add('qdata',
            CollectionType::class,
            [
                'entry_type' => QuanDataType::class,
                'allow_add'=>true,
                'label'=>'Historique de santé'

            ]
            )
            ->add('comment',TextareaType::class,[ 
                'attr' => [
                'class' => 'form-control','placeholder'=>'Observation',
            ],
            ])
            ->add('rdate',DateTimeType::class,["widget"=>"single_text"
            ,'attr' => [
                'class' => 'form-control','placeholder'=>'Prochaine rendez-vous',
            ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quantareport::class,
        ]);
    }
}
