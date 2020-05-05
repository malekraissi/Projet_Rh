<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200419204524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur ADD chefs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B32DDE75E7 FOREIGN KEY (chefs_id) REFERENCES chef (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B32DDE75E7 ON utilisateur (chefs_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B32DDE75E7');
        $this->addSql('DROP INDEX IDX_1D1C63B32DDE75E7 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP chefs_id');
    }
}
