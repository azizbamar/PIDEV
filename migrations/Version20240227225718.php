<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227225718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, message VARCHAR(255) NOT NULL, date_notification VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE insurance_request DROP INDEX UNIQ_D6B6AA3A8D4AA1C2, ADD INDEX IDX_D6B6AA3A8D4AA1C2 (request_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notification');
        $this->addSql('ALTER TABLE insurance_request DROP INDEX IDX_D6B6AA3A8D4AA1C2, ADD UNIQUE INDEX UNIQ_D6B6AA3A8D4AA1C2 (request_user_id)');
    }
}
