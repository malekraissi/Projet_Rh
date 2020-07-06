<?php

namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('nbreJour')
            ->add('validateur')
            ->add('date_deb', BirthdayType::class, [
                'placeholder' => [
                    'année' => 'Year', 'mois' => 'Month', 'jour' => 'Day',
                ]
            ])
            ->add('date_fin', BirthdayType::class, [
                'placeholder' => [
                    'année' => 'Year', 'mois' => 'Month', 'jour' => 'Day',
                ]
            ])
            ->add('nom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
