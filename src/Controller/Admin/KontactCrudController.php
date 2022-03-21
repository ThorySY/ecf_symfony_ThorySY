<?php

namespace App\Controller\Admin;

use App\Entity\Kontact;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KontactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kontact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastname'),
            TextField::new('firstname'),
            DateField::new('date'),
            AssociationField::new('product'),
            TextEditorField::new('message')
        ];
    }
    
}
