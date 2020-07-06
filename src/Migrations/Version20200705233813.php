<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200705233813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salarie_etrange ADD contrat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salarie_etrange ADD CONSTRAINT FK_FB48FE671823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_FB48FE671823061F ON salarie_etrange (contrat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salarie_etrange DROP FOREIGN KEY FK_FB48FE671823061F');
        $this->addSql('DROP INDEX IDX_FB48FE671823061F ON salarie_etrange');
        $this->addSql('ALTER TABLE salarie_etrange DROP contrat_id');
    }
}
