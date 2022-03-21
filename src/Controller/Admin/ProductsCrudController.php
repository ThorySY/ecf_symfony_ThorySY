<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField:: new('name'),
            SlugField:: new('slug')->setTargetFieldName('name'),
            ImageField:: new('image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField:: new('substitle'),
            TextareaField:: new('description'),
            BooleanField::new('isBest'),
            MoneyField:: new('price')->setCurrency('EUR'),
            AssociationField:: new('agents'),
            IntegerField::new('room','nombre de pièces'),
            IntegerField::new('floor', 'nombre de chambre'),
            NumberField::new('surface', 'surface'),
            ChoiceField::new('typetransaction', 'type de bien')
                ->setChoices(['vente'=>'vente', 'location' =>'location'])
                ->autocomplete(),
            ChoiceField::new('typebien', 'type de bien')
                ->setChoices(['villa'=>'villa', 'maison' =>'maison', 'appartement'=>'appartement'])
                ->autocomplete(),
            DateField::new('dateconstruct'),
            IntegerField::new('etage'),
            TextEditorField::new('adresse'),
            ArrayField::new('options')    

        ];
    }
    
}
