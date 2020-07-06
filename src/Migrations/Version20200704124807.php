<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704124807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur CHANGE nbre_enfant nbre_enfant INT DEFAULT NULL, CHANGE tel2 tel2 INT DEFAULT NULL, CHANGE rib rib INT NOT NULL, CHANGE mail_pro mail_pro VARCHAR(255) NOT NULL, CHANGE nom1_urgence nom1_urgence VARCHAR(255) NOT NULL, CHANGE prenom1_urgence prenom1_urgence VARCHAR(255) NOT NULL, CHANGE lien1 lien1 VARCHAR(255) NOT NULL, CHANGE lieu lieu VARCHAR(255) NOT NULL, CHANGE date_deb date_deb DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL, CHANGE periode_essai periode_essai VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur CHANGE nbre_enfant nbre_enfant INT NOT NULL, CHANGE tel2 tel2 INT NOT NULL, CHANGE rib rib INT DEFAULT NULL, CHANGE mail_pro mail_pro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom1_urgence nom1_urgence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom1_urgence prenom1_urgence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien1 lien1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu lieu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_deb date_deb DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL, CHANGE periode_essai periode_essai VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
