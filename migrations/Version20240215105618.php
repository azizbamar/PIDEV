<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215105618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_assurance DROP FOREIGN KEY FK_B36F5E5EEA080E3');
        $this->addSql('DROP INDEX IDX_B36F5E5EEA080E3 ON contrat_assurance');
        $this->addSql('ALTER TABLE contrat_assurance DROP contrat_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_assurance ADD contrat_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat_assurance ADD CONSTRAINT FK_B36F5E5EEA080E3 FOREIGN KEY (contrat_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B36F5E5EEA080E3 ON contrat_assurance (contrat_user_id)');
    }
}
