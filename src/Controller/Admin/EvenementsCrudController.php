<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EvenementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenements::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->renderContentMaximized()
            ->setEntityLabelInSingular('Événement')
            ->setEntityLabelInPlural('Événements')
            ->setEntityPermission('ROLE_BUREAU')
            ->setPageTitle('index', 'BDE LRU | Panel d\'Administration - %entity_label_plural%')
            ->setPaginatorPageSize(30)
            ->setDateFormat('dd/MM/yyyy')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //designation = "BDE_" + "SR|AC|AU" + event_id
            TextField::new("designation", "Désignation")->setRequired(true)->setHelp("BDE_ + \"SR|AC|JR|AU\" + event_id"),
            TextField::new('nom', 'Nom')->setRequired(true),
            TextEditorField::new('description', 'Description'),
            DateField::new('date', 'Date')->setRequired(true),
            TextField::new('heure_debut', 'Heure de début')->setHelp("Format: HH:MM"),
            TextField::new('heure_fin', 'Heure de fin')->setHelp("Format: HH:MM"),
            TextEditorField::new('emplacement', 'Emplacement')->setRequired(true),
            MoneyField::new('tarifA', 'Tarif Adhérent')->setCurrency('EUR')->setStoredAsCents(false),
            MoneyField::new('tarifNA', 'Tarif Non Adhérent')->setCurrency('EUR')->setStoredAsCents(false),
            TextField::new("img_url", "Image")->setHelp("Nom du l'image"),
            TextEditorField::new('map_url', 'Lien Google Maps')->setHelp("Lien Google Maps"),
        ];
    }
}
