<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326113342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CFF6526067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, demandeur_id INT DEFAULT NULL, offre_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, niveau_etude VARCHAR(255) NOT NULL, experience_prof VARCHAR(255) NOT NULL, INDEX IDX_B66FFE9295A6EE59 (demandeur_id), INDEX IDX_B66FFE924CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demandeur (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, ref VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_665DA61379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise_offre (entreprise_id INT NOT NULL, offre_id INT NOT NULL, INDEX IDX_A07A613A4AEAFEA (entreprise_id), INDEX IDX_A07A6134CC8505A (offre_id), PRIMARY KEY(entreprise_id, offre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, ref VARCHAR(255) NOT NULL, objet VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526067B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9295A6EE59 FOREIGN KEY (demandeur_id) REFERENCES demandeur (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE924CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE demandeur ADD CONSTRAINT FK_665DA61379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entreprise_offre ADD CONSTRAINT FK_A07A613A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_offre ADD CONSTRAINT FK_A07A6134CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9295A6EE59');
        $this->addSql('ALTER TABLE entreprise_offre DROP FOREIGN KEY FK_A07A613A4AEAFEA');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE924CC8505A');
        $this->addSql('ALTER TABLE entreprise_offre DROP FOREIGN KEY FK_A07A6134CC8505A');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526067B3B43D');
        $this->addSql('ALTER TABLE demandeur DROP FOREIGN KEY FK_665DA61379F37AE5');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE demandeur');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE entreprise_offre');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE user');
    }
}
