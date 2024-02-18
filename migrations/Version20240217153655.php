<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217153655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD title VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD date_pub DATE NOT NULL, ADD image_url VARCHAR(255) NOT NULL, ADD author_name VARCHAR(255) NOT NULL, ADD article_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD email VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD role VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP title, DROP description, DROP date_pub, DROP image_url, DROP author_name, DROP article_url');
        $this->addSql('ALTER TABLE client DROP email, DROP prenom, DROP nom, DROP role, DROP telephone');
    }
}
