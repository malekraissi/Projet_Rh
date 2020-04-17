<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312131906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE matricule matricule INT NOT NULL, CHANGE civilite civilite VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE situation_familiale situation_familiale VARCHAR(255) NOT NULL, CHANGE universite universite VARCHAR(255) NOT NULL, CHANGE diplome diplome VARCHAR(255) NOT NULL, CHANGE specialite specialite VARCHAR(255) NOT NULL, CHANGE annee_obtination annee_obtination INT NOT NULL, CHANGE rib rib INT DEFAULT NULL, CHANGE mail_pro mail_pro VARCHAR(255) DEFAULT NULL, CHANGE nom1_urgence nom1_urgence VARCHAR(255) DEFAULT NULL, CHANGE prenom1_urgence prenom1_urgence VARCHAR(255) DEFAULT NULL, CHANGE lien1 lien1 VARCHAR(255) DEFAULT NULL, CHANGE telephone1 telephone1 VARCHAR(255) DEFAULT NULL, CHANGE nom2_urgence nom2_urgence VARCHAR(255) DEFAULT NULL, CHANGE prenom2_urgence prenom2_urgence VARCHAR(255) DEFAULT NULL, CHANGE lien2 lien2 VARCHAR(255) DEFAULT NULL, CHANGE telephone2 telephone2 VARCHAR(255) DEFAULT NULL, CHANGE date_deb date_deb DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL, CHANGE periode_essai periode_essai DATE DEFAULT NULL, CHANGE deb_periode deb_periode DATE DEFAULT NULL, CHANGE fin_periode fin_periode DATE DEFAULT NULL, CHANGE date_embauche date_embauche DATE DEFAULT NULL, CHANGE date_depart date_depart DATE DEFAULT NULL, CHANGE raison raison LONGTEXT DEFAULT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur CHANGE id id INT NOT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE matricule matricule INT DEFAULT NULL, CHANGE civilite civilite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE situation_familiale situation_familiale VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE universite universite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diplome diplome VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE specialite specialite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annee_obtination annee_obtination INT DEFAULT NULL, CHANGE rib rib INT NOT NULL, CHANGE mail_pro mail_pro VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom1_urgence nom1_urgence VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom1_urgence prenom1_urgence VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien1 lien1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu lieu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone1 telephone1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom2_urgence nom2_urgence VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom2_urgence prenom2_urgence VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien2 lien2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone2 telephone2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_deb date_deb DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL, CHANGE periode_essai periode_essai DATE NOT NULL, CHANGE deb_periode deb_periode DATE NOT NULL, CHANGE fin_periode fin_periode DATE NOT NULL, CHANGE date_embauche date_embauche DATE NOT NULL, CHANGE date_depart date_depart DATE NOT NULL, CHANGE raison raison LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
