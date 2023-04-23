<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $adherent = new Adherent();
        $adherent->setEmail('anthonymudet94@gmail.com');
        $adherent->setId(135);
        $adherent->setNom('Mudet');
        $adherent->setPrenom('Anthony');
        $adherent->addRole('ROLE_BUREAU');
        $adherent->setAdresse('3 chemin des Genêts 17740 Sainte-Marie-de-Ré');
        $adherent->setCarteDelivre(true);
        $adherent->setDateNaissance(new \DateTime('2003-08-13'));
        $adherent->setDateCreation(new \DateTime('2023-01-26'));
        $adherent->setDateFinValidite(new \DateTime('2024-01-26'));
        $adherent->setFormation('Informatique');
        $adherent->setNiveau('L2');
        $adherent->setSexe('Homme');
        $adherent->setTelephone('0771142002');
        $adherent->setComposante('Collegium');
        $adherent->setCarteDelivre(true);
        $adherent->setStatut(true);
        $adherent->setStudypass(true);
        $adherent->setDateAdhesion(new \DateTime('2023-01-26'));
        $adherent->setResponsable("Anthony");

        $manager->persist($adherent);

        $manager->flush();
    }
}
