<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215144445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE medical_sheet (id INT AUTO_INCREMENT NOT NULL, medical_diagnosis LONGTEXT NOT NULL, treatment_plan LONGTEXT DEFAULT NULL, medical_reports LONGTEXT DEFAULT NULL, duration_of_incapacity INT DEFAULT NULL, procedure_performed LONGTEXT DEFAULT NULL, sick_leave_duration INT DEFAULT NULL, hospitalization_period INT DEFAULT NULL, rehabilitation_period INT DEFAULT NULL, medical_information LONGTEXT DEFAULT NULL, client_cin VARCHAR(10) NOT NULL, sinister_life_id INT NOT NULL, INDEX IDX_B2DACAB278AC42A8 (sinister_life_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, date_prescription DATE NOT NULL, doctor_cin VARCHAR(10) NOT NULL, client_cin VARCHAR(10) NOT NULL, medications LONGTEXT NOT NULL, status_prescription VARCHAR(20) NOT NULL, additional_notes LONGTEXT DEFAULT NULL, validity_duration INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE sinister (id INT AUTO_INCREMENT NOT NULL, date_sinister DATE NOT NULL, location VARCHAR(255) NOT NULL, amount_sinister DOUBLE PRECISION DEFAULT NULL, status_sinister VARCHAR(20) NOT NULL, sinister_user_id INT NOT NULL, sinister_type VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, beneficiary_name VARCHAR(20) DEFAULT NULL, INDEX IDX_73FC7B36A2C9AFBE (sinister_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(10) NOT NULL, first_name VARCHAR(20) NOT NULL, last_name VARCHAR(20) NOT NULL, email VARCHAR(20) NOT NULL, address VARCHAR(50) NOT NULL, phone_number VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE medical_sheet ADD CONSTRAINT FK_B2DACAB278AC42A8 FOREIGN KEY (sinister_life_id) REFERENCES sinister (id)');
        $this->addSql('ALTER TABLE sinister ADD CONSTRAINT FK_73FC7B36A2C9AFBE FOREIGN KEY (sinister_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_sheet DROP FOREIGN KEY FK_B2DACAB278AC42A8');
        $this->addSql('ALTER TABLE sinister DROP FOREIGN KEY FK_73FC7B36A2C9AFBE');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE medical_sheet');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE sinister');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
