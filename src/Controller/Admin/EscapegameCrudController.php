<?php

namespace App\Controller\Admin;

use App\Entity\Escapegame;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EscapegameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Escapegame::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nom'),
            TextField::new('description'),
            TimeField::new('duree'),
            ChoiceField::new('difficulte')  
            ->setChoices([
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ]),
            ImageField::new('imageName')
            ->setBasePath('images')
            ->setUploadDir('public/images/'),
        ];
    }
}
