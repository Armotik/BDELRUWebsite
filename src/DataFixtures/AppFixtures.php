<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use App\Entity\Evenements;
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

        $event = new Evenements();
        $event->setDesignation('BDE_SR000' . $event->getId());
        $event->setNom('Soirée jeux');
        $event->setDescription('Soirée jeux description');
        $event->setDate(new \DateTime('2024-01-26'));
        $event->setEmplacement("BDE LRU");
        $event->setTarifA(2.00);
        $event->setTarifNA(4.00);
        $event->setHeureDebut("14:00");
        $event->setHeureFin("18:00");
        $event->setMapUrl("https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2764.155489792357!2d-1.1575164234359923!3d46.14764978757877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480153c0a6d8ec93%3A0xef9d2f700ee841e7!2sLa%20Rochelle%20Universit%C3%A9!5e0!3m2!1sfr!2sfr!4v1682434096578!5m2!1sfr!2sfr");

        $manager->persist($event);

        $manager->flush();
    }
}
