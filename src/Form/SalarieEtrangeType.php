<?php

namespace App\Form;

use App\Entity\SalarieEtrange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalarieEtrangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('adresse')
            ->add('tel')
            ->add('date_embauche')
            ->add('type_sejour')
            ->add('num_sejour')
            ->add('date_debu_visa')
            ->add('date_fin_visa')
            ->add('contrat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SalarieEtrange::class,
        ]);
    }
}
