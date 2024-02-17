<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217132409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sinister (id INT AUTO_INCREMENT NOT NULL, date_sinister DATE NOT NULL, location VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sinister_property (id INT AUTO_INCREMENT NOT NULL, type_degat VARCHAR(255) NOT NULL, description_degat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sinister_vehicle (id INT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, nom_conducteur_a VARCHAR(255) NOT NULL, nom_conducteur_b VARCHAR(255) NOT NULL, prenom_conducteur_b VARCHAR(255) NOT NULL, prenom_conducteur_a VARCHAR(255) NOT NULL, adresse_conducteur_a VARCHAR(255) NOT NULL, adresse_conducteur_b VARCHAR(255) NOT NULL, num_permis_a VARCHAR(255) NOT NULL, num_permis_b VARCHAR(255) NOT NULL, delivre_a DATE NOT NULL, delivre_b DATE NOT NULL, num_contrat_a VARCHAR(255) NOT NULL, num_contrat_b VARCHAR(255) NOT NULL, marque_vehicule_a VARCHAR(255) NOT NULL, marque_vehicule_b VARCHAR(255) NOT NULL, immatriculation_a VARCHAR(255) NOT NULL, immatriculation_b VARCHAR(255) NOT NULL, bvehicule_assure_par VARCHAR(255) NOT NULL, agence VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sinister_vehicle ADD CONSTRAINT FK_1E2798ADBF396750 FOREIGN KEY (id) REFERENCES sinister (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sinister_vehicle DROP FOREIGN KEY FK_1E2798ADBF396750');
        $this->addSql('DROP TABLE sinister');
        $this->addSql('DROP TABLE sinister_property');
        $this->addSql('DROP TABLE sinister_vehicle');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
