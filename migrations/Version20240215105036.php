<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215105036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE insurance_request (id INT AUTO_INCREMENT NOT NULL, request_user_id INT DEFAULT NULL, date_request DATE NOT NULL, type_insurance VARCHAR(20) NOT NULL, status VARCHAR(20) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_D6B6AA3A8D4AA1C2 (request_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE life_request (id INT NOT NULL, age VARCHAR(20) NOT NULL, chron_disease VARCHAR(50) NOT NULL, surgery VARCHAR(50) NOT NULL, civil_status VARCHAR(20) NOT NULL, occupation VARCHAR(30) NOT NULL, chron_disease_description VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprety_request (id INT NOT NULL, property_forme VARCHAR(20) NOT NULL, number_rooms VARCHAR(10) NOT NULL, address VARCHAR(50) NOT NULL, property_value VARCHAR(20) NOT NULL, surface VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_request (id INT NOT NULL, marque VARCHAR(20) NOT NULL, modele VARCHAR(20) NOT NULL, fab_year DATE NOT NULL, serial_number VARCHAR(20) NOT NULL, matricul_number VARCHAR(20) NOT NULL, vehicle_price VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE insurance_request ADD CONSTRAINT FK_D6B6AA3A8D4AA1C2 FOREIGN KEY (request_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE life_request ADD CONSTRAINT FK_9DE44E0CBF396750 FOREIGN KEY (id) REFERENCES insurance_request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprety_request ADD CONSTRAINT FK_9D1710DCBF396750 FOREIGN KEY (id) REFERENCES insurance_request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicle_request ADD CONSTRAINT FK_24E4D2F0BF396750 FOREIGN KEY (id) REFERENCES insurance_request (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_request DROP FOREIGN KEY FK_D6B6AA3A8D4AA1C2');
        $this->addSql('ALTER TABLE life_request DROP FOREIGN KEY FK_9DE44E0CBF396750');
        $this->addSql('ALTER TABLE proprety_request DROP FOREIGN KEY FK_9D1710DCBF396750');
        $this->addSql('ALTER TABLE vehicle_request DROP FOREIGN KEY FK_24E4D2F0BF396750');
        $this->addSql('DROP TABLE insurance_request');
        $this->addSql('DROP TABLE life_request');
        $this->addSql('DROP TABLE proprety_request');
        $this->addSql('DROP TABLE vehicle_request');
    }
}
