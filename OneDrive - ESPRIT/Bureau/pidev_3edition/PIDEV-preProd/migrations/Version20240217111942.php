<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217111942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medical_sheet (id INT AUTO_INCREMENT NOT NULL, medical_diagnosis LONGTEXT NOT NULL, treatment_plan LONGTEXT DEFAULT NULL, medical_reports LONGTEXT DEFAULT NULL, duration_of_incapacity INT DEFAULT NULL, procedure_performed LONGTEXT DEFAULT NULL, sick_leave_duration INT DEFAULT NULL, hospitalization_period INT DEFAULT NULL, rehabilitation_period INT DEFAULT NULL, medical_information LONGTEXT DEFAULT NULL, sinister_life_id INT NOT NULL, user_cin_id INT NOT NULL, INDEX IDX_B2DACAB278AC42A8 (sinister_life_id), INDEX IDX_B2DACAB28C2B4E44 (user_cin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE medical_sheet ADD CONSTRAINT FK_B2DACAB278AC42A8 FOREIGN KEY (sinister_life_id) REFERENCES sinister (id)');
        $this->addSql('ALTER TABLE medical_sheet ADD CONSTRAINT FK_B2DACAB28C2B4E44 FOREIGN KEY (user_cin_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_sheet DROP FOREIGN KEY FK_B2DACAB278AC42A8');
        $this->addSql('ALTER TABLE medical_sheet DROP FOREIGN KEY FK_B2DACAB28C2B4E44');
        $this->addSql('DROP TABLE medical_sheet');
    }
}
