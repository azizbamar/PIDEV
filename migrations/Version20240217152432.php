<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217152432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sinister ADD sinister_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sinister ADD CONSTRAINT FK_73FC7B36A2C9AFBE FOREIGN KEY (sinister_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_73FC7B36A2C9AFBE ON sinister (sinister_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sinister DROP FOREIGN KEY FK_73FC7B36A2C9AFBE');
        $this->addSql('DROP INDEX IDX_73FC7B36A2C9AFBE ON sinister');
        $this->addSql('ALTER TABLE sinister DROP sinister_user_id');
    }
}
