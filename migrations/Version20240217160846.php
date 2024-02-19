<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217160846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66642B8210 ON article (admin_id)');
        $this->addSql('ALTER TABLE categorie ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_497DD634642B8210 ON categorie (admin_id)');
        $this->addSql('ALTER TABLE client ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_C7440455642B8210 ON client (admin_id)');
        $this->addSql('ALTER TABLE commentaire ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC642B8210 ON commentaire (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66642B8210');
        $this->addSql('DROP INDEX IDX_23A0E66642B8210 ON article');
        $this->addSql('ALTER TABLE article DROP admin_id');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634642B8210');
        $this->addSql('DROP INDEX IDX_497DD634642B8210 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP admin_id');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455642B8210');
        $this->addSql('DROP INDEX IDX_C7440455642B8210 ON client');
        $this->addSql('ALTER TABLE client DROP admin_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC642B8210');
        $this->addSql('DROP INDEX IDX_67F068BC642B8210 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP admin_id');
    }
}
