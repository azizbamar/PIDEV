<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219001728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_request DROP INDEX IDX_D6B6AA3A8D4AA1C2, ADD UNIQUE INDEX UNIQ_D6B6AA3A8D4AA1C2 (request_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_request DROP INDEX UNIQ_D6B6AA3A8D4AA1C2, ADD INDEX IDX_D6B6AA3A8D4AA1C2 (request_user_id)');
    }
}
