<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200505124247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, resume VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets_technologies (projets_id INT NOT NULL, technologies_id INT NOT NULL, INDEX IDX_DCC225EE597A6CB7 (projets_id), INDEX IDX_DCC225EE8F8A14FA (technologies_id), PRIMARY KEY(projets_id, technologies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, version VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projets_technologies ADD CONSTRAINT FK_DCC225EE597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_technologies ADD CONSTRAINT FK_DCC225EE8F8A14FA FOREIGN KEY (technologies_id) REFERENCES technologies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projets_technologies DROP FOREIGN KEY FK_DCC225EE597A6CB7');
        $this->addSql('ALTER TABLE projets_technologies DROP FOREIGN KEY FK_DCC225EE8F8A14FA');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE projets_technologies');
        $this->addSql('DROP TABLE technologies');
    }
}
