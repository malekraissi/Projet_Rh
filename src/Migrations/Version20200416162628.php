<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416162628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conge (id INT AUTO_INCREMENT NOT NULL, typeconge_id INT DEFAULT NULL, tel INT NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, nbre_jour INT NOT NULL, adresse VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_2ED8934896C514D1 (typeconge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, poles_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2449BA157AE256B9 (poles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_FD6042E16D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_50159CA919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, tache VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, INDEX IDX_93872075C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_conge (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nbre_jour VARCHAR(255) NOT NULL, paiement TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED8934896C514D1 FOREIGN KEY (typeconge_id) REFERENCES type_conge (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA157AE256B9 FOREIGN KEY (poles_id) REFERENCES pole (id)');
        $this->addSql('ALTER TABLE pole ADD CONSTRAINT FK_FD6042E16D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA919EB6921');
        $this->addSql('ALTER TABLE pole DROP FOREIGN KEY FK_FD6042E16D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA157AE256B9');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075C18272');
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED8934896C514D1');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE conge');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE pole');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE type_conge');
    }
}
