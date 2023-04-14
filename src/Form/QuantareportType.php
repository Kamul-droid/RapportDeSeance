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
use App\Entity\User;
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
use Symfony\Component\Security\Core\Security;

class QuantareportType extends AbstractType
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security=$security;
    }
   
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->security->getUser();
        $builder
            ->add('consult_method',ChoiceType::class,[
                'label'=>'Type de séance',
                'choices' => [
                    'Presentiel'=>'Présentiel',
                    'Metaespace'=>'Metaespace',
                   
                ],
                'attr'=>[
                    'style'=>'border-radius:50px; border:2px solid blue; width:100%',
                    
                ],
                  'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px'
                  
                ]
            ])
            ->add('user',EntityType::class,[
                'class'=>User::class,
                'label' => 'Praticien',
                'choice_label' => function(){
                    return  $this->security->getUser()->getUsername();
                },
                'attr'=>[
                    'style'=>'border-radius:50px; border:2px solid blue; width:100%',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px'
                  
                ],
                'mapped'=>false,
                'disabled'=>true,

            ])
            ->add('client',EntityType::class,[
                'class'=>Client::class,
                'label' => 'Client',
                'choice_label' => function($client){
                    return $client->getName().' '.$client->getSurname();
                },
                'attr'=>[
                    'style'=>'border-radius:50px; border:2px solid blue; width:100%',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px'
                  
                ]
            ])
            ->add('started_at',DateTimeType::class,["widget"=>"single_text",
            'label'=>'Début de la séance',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:100%; justify-content:left; margin:auto; display:flex;'
                  
                ],
            ])
            ->add('ended_at',DateTimeType::class,["widget"=>"single_text",
            'label'=>'Fin de la séance',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:100%; justify-content:left; margin:auto; display:flex;'
                  
                ],
            ])
            ->add('soundplay',TextType::class,[
                'label'=>'Musique',
                'label_attr'=>[
                    'class'=>'form-control',
                    
                ],
                'attr'=>[
                    'style'=>'border-radius:50px; border:2px solid blue; width:100%',
                    
                    
                ]
            ])
            
            ->add('pobject',EntityType::class,[
                'class'=>PrimaryObject::class,
                'label' => 'Motifs principal',
                'choice_label' => 'value',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px;'
                  
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('sobject',EntityType::class,[
                'class'=>SecondaryObject::class,
                'label' => 'Motif secondaire',
                'choice_label' => 'subject',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
                  
                ],
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('gstate',
            CollectionType::class,
            [
                'entry_type' => GlobalStateType::class,
                'allow_add'=>true,
                'label'=>'Etat général',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
                  
                ],

            ]
            )
            ->add('health',
            CollectionType::class,
            [
                'entry_type' => HealthHistoryType::class,
                'allow_add'=>true,
                'label'=>'Historique de santé',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
                  
                ],

            ]
            )
            ->add('qdata',
            CollectionType::class,
            [
                'entry_type' => QuanDataType::class,
                'allow_add'=>true,
                'label'=>'Données de la séance',
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
                  
                ],

            ]
            )
            ->add('comment',TextareaType::class,[ 
                'attr' => [
                    
                    'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                    
                ],
                'label_attr'=>[
                    'class'=>'h2',
                    'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
                  
                ],
            ])
            ->add('rdate',DateTimeType::class,["widget"=>"single_text"
            ,'attr' => [
                    
                'style'=>'border-radius:10px; border:2px solid blue; width:100%; margin-right: auto; padding:25px; font-weight:bold; line-height:1.1; font-size:1.3rem; gap:0.5em;',
                
            ],
            'label_attr'=>[
                'class'=>'h2',
                'style'=>'font-size:25px; width:30%; justify-content:center; margin:auto; display:flex;'
              
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
