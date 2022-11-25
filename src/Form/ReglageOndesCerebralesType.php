<?php

namespace App\Form;

use App\Entity\ReglageOndesCerebrales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReglageOndesCerebralesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => ' Reglages Ondes Cerebrales ',
                "label_attr" => ['class' => 'offset-3 title'],
                "attr" => ["class" => "form-group form-control"]
            ])
            ->add('nom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReglageOndesCerebrales::class,
        ]);
    }
}
