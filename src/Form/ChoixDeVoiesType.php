<?php

namespace App\Form;

use App\Entity\ChoixDeVoies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoixDeVoiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
        'label' => ' Choix De Voies',
        "label_attr" => ['class' => 'offset-3 title'],
        "attr" => ["class" => "form-group form-control"]
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChoixDeVoies::class,
        ]);
    }
}
