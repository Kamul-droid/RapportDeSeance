<?php

namespace App\Form;

use App\Entity\DetoxDuCorps;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetoxDuCorpsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'Detox Du Corps ',
                "label_attr" => ['class' => 'offset-3 title'],
                "attr" => ["class" => "form-group form-control"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetoxDuCorps::class,
        ]);
    }
}
