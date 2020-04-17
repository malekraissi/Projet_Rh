<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312082524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pole DROP FOREIGN KEY FK_FD6042E1737800BA');
        $this->addSql('DROP INDEX IDX_FD6042E1737800BA ON pole');
        $this->addSql('ALTER TABLE pole DROP equipes_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pole ADD equipes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pole ADD CONSTRAINT FK_FD6042E1737800BA FOREIGN KEY (equipes_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_FD6042E1737800BA ON pole (equipes_id)');
    }
}
