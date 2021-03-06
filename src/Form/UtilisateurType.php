<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;
use Symfony\Component\Form\Extension\Core\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('matricule')
            ->add('civilite')
            ->add('nbre_enfant')
            ->add('nom')
            ->add('prenom')
            ->add('situation_familiale', ChoiceType::class, [
                'choices'  => [
                    'célibataire' => 'célibataire',
                    'marié' => 'marié',
                    'divorcé' => 'divorcé',
                    'veuf' => 'veuf',
                ],
            ])
            ->add('universite')
            ->add('diplome')
            ->add('specialite')
            ->add('annee_obtination')
            ->add('langage')
            ->add('date_naiss', BirthdayType::class, [
                'placeholder' => [
                    'année' => 'Year', 'mois' => 'Month', 'jour' => 'Day',
                ]
            ])
            ->add('cin')
            ->add('date_cin', BirthdayType::class, [
                'placeholder' => [
                    'année' => 'Year', 'mois' => 'Month', 'jour' => 'Day',
                ]
            ])
            ->add('num_cnss')
            ->add('adresse')
            ->add('code_postal')
            ->add('tel1')
            ->add('tel2')
            ->add('rib')
            ->add('mail_pro')
            ->add('nom1_urgence')
            ->add('prenom1_urgence')
            ->add('lien1')
            ->add('lieu')
            ->add('telephone1')
            ->add('nom2_urgence')
            ->add('prenom2_urgence')
            ->add('lien2')
            ->add('telephone2')
            ->add('date_deb')
            ->add('date_fin')
            ->add('periode_essai')
            ->add('date_embauche')
            ->add('date_depart')
            ->add('raison')
            ->add('contrat')
            ->add('equipes')

        ->add('titre');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
