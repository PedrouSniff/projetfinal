<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513122248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE difficulte (id INT AUTO_INCREMENT NOT NULL, etoile VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE escapegame (id INT AUTO_INCREMENT NOT NULL, difficulte_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duree TIME NOT NULL, INDEX IDX_3650A337E6357589 (difficulte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame ADD CONSTRAINT FK_3650A337E6357589 FOREIGN KEY (difficulte_id) REFERENCES difficulte (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame DROP FOREIGN KEY FK_3650A337E6357589
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE difficulte
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE escapegame
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP nom, DROP prenom
        SQL);
    }
}
