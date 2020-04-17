<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416193844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chef (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Managers (chef_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_503F8250150A48F1 (chef_id), INDEX IDX_503F8250FB88E14F (utilisateur_id), PRIMARY KEY(chef_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chef_utilisateur (chef_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_EF9908A1150A48F1 (chef_id), INDEX IDX_EF9908A1FB88E14F (utilisateur_id), PRIMARY KEY(chef_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conge (id INT AUTO_INCREMENT NOT NULL, typeconge_id INT DEFAULT NULL, tel INT NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, nbre_jour INT NOT NULL, adresse VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_2ED8934896C514D1 (typeconge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_FD6042E16D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, tache VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, INDEX IDX_93872075C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache_utilisateur (tache_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_8E15C4FDD2235D39 (tache_id), INDEX IDX_8E15C4FDFB88E14F (utilisateur_id), PRIMARY KEY(tache_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_conge (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nbre_jour VARCHAR(255) NOT NULL, paiement TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, equipes_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, matricule INT NOT NULL, civilite VARCHAR(255) NOT NULL, nbre_enfant INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, situation_familiale VARCHAR(255) NOT NULL, universite VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, annee_obtination INT NOT NULL, langage VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, cin INT NOT NULL, date_cin DATE NOT NULL, num_cnss INT NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, tel1 INT NOT NULL, tel2 INT NOT NULL, rib INT DEFAULT NULL, mail_pro VARCHAR(255) DEFAULT NULL, nom1_urgence VARCHAR(255) DEFAULT NULL, prenom1_urgence VARCHAR(255) DEFAULT NULL, lien1 VARCHAR(255) DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, telephone1 VARCHAR(255) DEFAULT NULL, nom2_urgence VARCHAR(255) DEFAULT NULL, prenom2_urgence VARCHAR(255) DEFAULT NULL, lien2 VARCHAR(255) DEFAULT NULL, telephone2 VARCHAR(255) DEFAULT NULL, date_deb DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, periode_essai VARCHAR(255) DEFAULT NULL, date_embauche DATE DEFAULT NULL, date_depart DATE DEFAULT NULL, raison LONGTEXT DEFAULT NULL, INDEX IDX_1D1C63B31823061F (contrat_id), INDEX IDX_1D1C63B3737800BA (equipes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Managers ADD CONSTRAINT FK_503F8250150A48F1 FOREIGN KEY (chef_id) REFERENCES chef (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Managers ADD CONSTRAINT FK_503F8250FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chef_utilisateur ADD CONSTRAINT FK_EF9908A1150A48F1 FOREIGN KEY (chef_id) REFERENCES chef (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chef_utilisateur ADD CONSTRAINT FK_EF9908A1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED8934896C514D1 FOREIGN KEY (typeconge_id) REFERENCES type_conge (id)');
        $this->addSql('ALTER TABLE pole ADD CONSTRAINT FK_FD6042E16D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE tache_utilisateur ADD CONSTRAINT FK_8E15C4FDD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tache_utilisateur ADD CONSTRAINT FK_8E15C4FDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B31823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3737800BA FOREIGN KEY (equipes_id) REFERENCES equipe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Managers DROP FOREIGN KEY FK_503F8250150A48F1');
        $this->addSql('ALTER TABLE chef_utilisateur DROP FOREIGN KEY FK_EF9908A1150A48F1');
        $this->addSql('ALTER TABLE pole DROP FOREIGN KEY FK_FD6042E16D861B89');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3737800BA');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075C18272');
        $this->addSql('ALTER TABLE tache_utilisateur DROP FOREIGN KEY FK_8E15C4FDD2235D39');
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED8934896C514D1');
        $this->addSql('ALTER TABLE Managers DROP FOREIGN KEY FK_503F8250FB88E14F');
        $this->addSql('ALTER TABLE chef_utilisateur DROP FOREIGN KEY FK_EF9908A1FB88E14F');
        $this->addSql('ALTER TABLE tache_utilisateur DROP FOREIGN KEY FK_8E15C4FDFB88E14F');
        $this->addSql('DROP TABLE chef');
        $this->addSql('DROP TABLE Managers');
        $this->addSql('DROP TABLE chef_utilisateur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE conge');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE pole');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE tache_utilisateur');
        $this->addSql('DROP TABLE type_conge');
        $this->addSql('DROP TABLE utilisateur');
    }
}
