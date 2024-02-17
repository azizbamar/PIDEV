<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217093028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_sheet ADD CONSTRAINT FK_B2DACAB28C2B4E44 FOREIGN KEY (user_cin_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B2DACAB28C2B4E44 ON medical_sheet (user_cin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_sheet DROP FOREIGN KEY FK_B2DACAB28C2B4E44');
        $this->addSql('DROP INDEX IDX_B2DACAB28C2B4E44 ON medical_sheet');
    }
}
