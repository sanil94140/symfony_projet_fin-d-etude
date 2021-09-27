<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=>'Votre nom', 'attr'=>[
                    'placeholder'=>'Tapez votre nom ici...'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label'=>'Votre prénom', 'attr'=>[
                    'placeholder'=>'Tapez votre prénom ici...'
                ]
            ])
            ->add('sexe', TextType::class, [
                'label'=>'Sexe', 'attr'=>[
                    'placeholder'=>'Sexe...'
                ]
            ])
            ->add('pseudo', TextType::class, [
                'label'=>'Pseudo', 'attr'=>[
                    'placeholder'=>'Tapez un pseudo...'
                ]
            ])
            ->add('numeroDeLaRue', IntegerType::class, [
                'label'=>'Numéro', 'attr'=>[
                    'placeholder'=>'Tapez le numéro de votre résidence...'
                ]
            ])
            ->add('nomDeLaRue', TextType::class, [
                'label'=>'Nom de la rue', 'attr'=>[
                    'placeholder'=>'Tapez le nom de la rue de votre résidence...'
                ]
            ])
            ->add('ville', TextType::class, [
                'label'=>'Ville', 'attr'=>[
                    'placeholder'=>'Tapez votre nom de votre ville...'
                ]
            ])
            ->add('codePostal', IntegerType::class, [
                'label'=>'Code postal', 'attr'=>[
                    'placeholder'=>'Tapez le code postal de votre ville...'
                ]
            ])
            ->add('pays', TextType::class, [
                'label'=>'Pays', 'attr'=>[
                    'placeholder'=>'Tapez le pays de votre résidence...'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre adresse email', 'attr'=>[
                    'placeholder'=>'Tapez votre adresse email...'
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                            'placeholder'=>'Tapez un mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('RGPD', CheckboxType::class, [
                'label'=>"A confirmer: J'atteste que mes données peuvent être utilisé qu'en interne de l'entreprise, pour diffuser des contenues d'informations, d'éducations et commerciales",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
