<?php

namespace App\Form;

use App\Entity\ProfilChromosomesEtGenes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilChromosomesEtGenesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('evaluation_des_chromosomes')
            ->add('evaluation_des_genes')
            ->add('auto_feedback_pour_celle_Comm')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilChromosomesEtGenes::class,
        ]);
    }
}
