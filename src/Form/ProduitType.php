<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('image')
            ->add('description',TextareaType::class,[
                'label' => 'Description du produit',
                'attr' => [
                    'placeholder' => 'Tapez la description ici...'
                ]
            ])
            ->add('poids')
            ->add('tailleVetement')
            ->add('prix', MoneyType::class,
            //  [
            //     'divisor' => 100,
            // ]
            )
            ->add('sexe')
            ->add('categorie', EntityType::class,[
                'label' => 'Catégorie du produit',
                'placeholder' => '--Choisir une catégorie--',
                'class' => Categorie::class,
                'choice_label' => function(Categorie $category){
                    return strtoupper($category->getNomDeLaCategorie());
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
