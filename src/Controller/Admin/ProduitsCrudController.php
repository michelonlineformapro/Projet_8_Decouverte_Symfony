<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use App\Form\ReferencesType;
use App\Form\RegistrationFormType;
use Cassandra\Type\UserType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produits::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('nomProduit', "Nom du produit"),
            TextEditorField::new('descriptionProduit', 'Description du produit'),
            NumberField::new('prixProduit', 'prix du produit'),
            ImageField::new('imageproduit')
            ->setBasePath('/img')
            ->setUploadDir('public/img/')
            ->setFormType(FileUploadType::class)
            ->setRequired(true),
            BooleanField::new('stockProduit', 'Produit en stock'),
            DateTimeField::new('dateDepotProduit', 'date de depot'),
            AssociationField::new('categories', 'Catégorie du produit'),
            AssociationField::new('distributeurs', 'Liste des distributeurs'),
            IntegerField::new('numero')
            ->setFormType(ReferencesType::class),
        ];
    }

}
