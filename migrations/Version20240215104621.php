<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215104621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat_assurance (id INT AUTO_INCREMENT NOT NULL, contrat_user_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_B36F5E5EEA080E3 (contrat_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_habitat (id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, matricule_agent VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_vehicule (id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, matricule_agent VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_vie (id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, matricule_agent VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat_assurance ADD CONSTRAINT FK_B36F5E5EEA080E3 FOREIGN KEY (contrat_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contrat_habitat ADD CONSTRAINT FK_92F9E19EBF396750 FOREIGN KEY (id) REFERENCES contrat_assurance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contrat_vehicule ADD CONSTRAINT FK_90E0E547BF396750 FOREIGN KEY (id) REFERENCES contrat_assurance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contrat_vie ADD CONSTRAINT FK_C01ECEA9BF396750 FOREIGN KEY (id) REFERENCES contrat_assurance (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_assurance DROP FOREIGN KEY FK_B36F5E5EEA080E3');
        $this->addSql('ALTER TABLE contrat_habitat DROP FOREIGN KEY FK_92F9E19EBF396750');
        $this->addSql('ALTER TABLE contrat_vehicule DROP FOREIGN KEY FK_90E0E547BF396750');
        $this->addSql('ALTER TABLE contrat_vie DROP FOREIGN KEY FK_C01ECEA9BF396750');
        $this->addSql('DROP TABLE contrat_assurance');
        $this->addSql('DROP TABLE contrat_habitat');
        $this->addSql('DROP TABLE contrat_vehicule');
        $this->addSql('DROP TABLE contrat_vie');
    }
}
