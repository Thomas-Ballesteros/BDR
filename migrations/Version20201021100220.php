<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021100220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, universe_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, is_archived TINYINT(1) NOT NULL, illustration VARCHAR(255) DEFAULT NULL, INDEX IDX_232B318C5CD9AF2 (universe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE master (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, illustration VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE master_game (master_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_89E1CE513B3DB11 (master_id), INDEX IDX_89E1CE5E48FD905 (game_id), PRIMARY KEY(master_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, illustration VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, icon VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, is_archived TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C5CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id)');
        $this->addSql('ALTER TABLE master_game ADD CONSTRAINT FK_89E1CE513B3DB11 FOREIGN KEY (master_id) REFERENCES master (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE master_game ADD CONSTRAINT FK_89E1CE5E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE master_game DROP FOREIGN KEY FK_89E1CE5E48FD905');
        $this->addSql('ALTER TABLE master_game DROP FOREIGN KEY FK_89E1CE513B3DB11');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C5CD9AF2');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE master');
        $this->addSql('DROP TABLE master_game');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE universe');
    }
}
