<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217190530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription ADD user_cin_id INT NOT NULL, DROP client_cin');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D98C2B4E44 FOREIGN KEY (user_cin_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1FBFB8D98C2B4E44 ON prescription (user_cin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D98C2B4E44');
        $this->addSql('DROP INDEX IDX_1FBFB8D98C2B4E44 ON prescription');
        $this->addSql('ALTER TABLE prescription ADD client_cin VARCHAR(10) NOT NULL, DROP user_cin_id');
    }
}
