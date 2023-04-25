<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdherentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adherent::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->renderContentMaximized()
            ->setEntityLabelInSingular('Adhérent')
            ->setEntityLabelInPlural('Adhérents')
            ->setEntityPermission('ROLE_BUREAU')
            ->setPageTitle('index', 'BDE LRU | Panel d\'Administration - %entity_label_plural%')
            ->setPaginatorPageSize(30)
            ->setDateFormat('dd/MM/yyyy')
            ;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id', 'Numéro d\'adhérent')->setRequired(true),
            TextField::new('prenom', 'Prénom')->setRequired(true),
            TextField::new('nom', 'Nom')->setRequired(true),
            TextField::new('sexe', 'Sexe')->setRequired(true),
            TextField::new('email', 'Email')->setRequired(true),
            TextField::new('telephone', 'Téléphone'),
            TextEditorField::new('adresse', 'Adresse'),
            DateField::new('date_naissance', 'Date de naissance')->setRequired(true),
            TextField::new('formation', 'Formation')->setRequired(true),
            TextField::new('niveau', 'Niveau')->setFormType('Symfony\Component\Form\Extension\Core\Type\ChoiceType')->setFormTypeOptions([
                'choices' => [
                    'L1' => 'L1',
                    'L2' => 'L2',
                    'L3' => 'L3',
                    'M1' => 'M1',
                    'M2' => 'M2',
                    'DOCTORAT' => 'DOCTORAT',
                    'AUTRE' => 'AUTRE',
                ],
            ]),
            TextField::new('composante', 'Composante')->setFormType('Symfony\Component\Form\Extension\Core\Type\ChoiceType')->setFormTypeOptions([
                'choices' => [
                    'FST' => 'FST',
                    'LLASH' => 'LLASH',
                    'FDSPM' => 'FDPSM',
                    'LUDI' => 'LUDI',
                    'EXCELIA' => 'EXCELIA',
                    'IFSI' => 'IFSI',
                    'AUTRE' => 'AUTRE',
                ],
            ]),
            DateField::new('date_adhesion', 'Date d\'inscription')->setRequired(true),
            DateField::new('date_creation', 'Date de création')->setRequired(true),
            DateField::new('date_fin_validite', 'Date de fin de validité')->setRequired(true),
            BooleanField::new('statut', 'Payé ?'),
            BooleanField::new('carte_delivre', 'Carte délivrée'),
            BooleanField::new('studypass', 'Studypass'),
            CollectionField::new('roles', 'Rôles')->setFormTypeOptions([
                'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',
                'entry_options'  => [
                    'choices'  => [
                        'Adhérent' => 'ROLE_ADHERENT',
                        'Bureau'     => 'ROLE_BUREAU',
                        'Bureau Restreint'    => 'ROLE_BUREAU_RESTREINT',
                    ],
                ],
            ]),
            TextField::new("responsable", "Prénom du responsable"),
        ];
    }
}
