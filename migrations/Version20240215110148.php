<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215110148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_assurance ADD request_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat_assurance ADD CONSTRAINT FK_B36F5E5E427EB8A5 FOREIGN KEY (request_id) REFERENCES insurance_request (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B36F5E5E427EB8A5 ON contrat_assurance (request_id)');
        $this->addSql('ALTER TABLE insurance_request DROP FOREIGN KEY FK_D6B6AA3A8506F791');
        $this->addSql('DROP INDEX UNIQ_D6B6AA3A8506F791 ON insurance_request');
        $this->addSql('ALTER TABLE insurance_request DROP contrat_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_assurance DROP FOREIGN KEY FK_B36F5E5E427EB8A5');
        $this->addSql('DROP INDEX UNIQ_B36F5E5E427EB8A5 ON contrat_assurance');
        $this->addSql('ALTER TABLE contrat_assurance DROP request_id');
        $this->addSql('ALTER TABLE insurance_request ADD contrat_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE insurance_request ADD CONSTRAINT FK_D6B6AA3A8506F791 FOREIGN KEY (contrat_id_id) REFERENCES contrat_assurance (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D6B6AA3A8506F791 ON insurance_request (contrat_id_id)');
    }
}
