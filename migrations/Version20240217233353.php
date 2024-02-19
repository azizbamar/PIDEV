<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217233353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport (id INT AUTO_INCREMENT NOT NULL, sinister_rapport_id INT DEFAULT NULL, decision VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BE34A09CE2DB65F3 (sinister_rapport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport ADD CONSTRAINT FK_BE34A09CE2DB65F3 FOREIGN KEY (sinister_rapport_id) REFERENCES sinister (id)');
        $this->addSql('ALTER TABLE sinister ADD status VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport DROP FOREIGN KEY FK_BE34A09CE2DB65F3');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('ALTER TABLE sinister DROP status');
    }
}
