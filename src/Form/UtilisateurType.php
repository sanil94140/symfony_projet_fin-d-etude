<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            // ->add('roles')
            // ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('pseudo')
            ->add('numeroDeLaRue')
            ->add('nomDeLaRue')
            ->add('ville')
            ->add('codePostal')
            ->add('pays')
            // ->add('RGPD')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
