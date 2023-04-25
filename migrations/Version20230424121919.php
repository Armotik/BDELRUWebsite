<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424121919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, sexe VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) NOT NULL, formation VARCHAR(255) NOT NULL, composante VARCHAR(255) NOT NULL, telephone VARCHAR(10) DEFAULT NULL, date_adhesion DATE NOT NULL, statut TINYINT(1) NOT NULL, date_creation DATE DEFAULT NULL, carte_delivre TINYINT(1) NOT NULL, date_fin_validite DATE NOT NULL, studypass TINYINT(1) NOT NULL, responsable VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_90D3F060E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherent');
    }
}
