<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Distributeurs;
use App\Entity\Produits;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_produit', TextType::class)
            ->add('description_produit', TextareaType::class)
            ->add('prix_produit', NumberType::class)
            ->add('image_produit', FileType::class,[
                'label' => 'Image de l\'annonce',
                'required' => false,
                'data_class' => null,
                'empty_data' => 'Aucune image pour ce produit !'
            ])
            ->add('stock_produit', CheckboxType::class)
            ->add('date_depot_produit', DateType::class,[
                'widget' => 'single_text'
            ])
            //ceci est un formulaire imbriqué
                //On appele form/ReferencesType form

            ->add('numero', ReferencesType::class,[
                'required' => true
            ])

            ->add('distributeurs', EntityType::class,[
                'class' => Distributeurs::class,
                'choice_label' => 'nomDistributeur',
                'label' => 'Selectionnez un ou plusieur distributeurs',
                'multiple' => true
            ])
            ->add('categories', EntityType::class,[
                'class' => Categories::class,
                'choice_label' => 'nomCategorie',
                'label' => 'Catégorie de l\'annonce',
                'required' => true
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
