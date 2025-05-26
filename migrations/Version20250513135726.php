<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513135726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame DROP FOREIGN KEY FK_3650A337E6357589
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA144CE7D344
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE difficulte
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE etoilenote
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3650A337E6357589 ON escapegame
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame DROP difficulte_id
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_CFBDFA144CE7D344 ON note
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP etoilenote_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE difficulte (id INT AUTO_INCREMENT NOT NULL, etoile INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE etoilenote (id INT AUTO_INCREMENT NOT NULL, etoile INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame ADD difficulte_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE escapegame ADD CONSTRAINT FK_3650A337E6357589 FOREIGN KEY (difficulte_id) REFERENCES difficulte (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3650A337E6357589 ON escapegame (difficulte_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD etoilenote_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD CONSTRAINT FK_CFBDFA144CE7D344 FOREIGN KEY (etoilenote_id) REFERENCES etoilenote (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CFBDFA144CE7D344 ON note (etoilenote_id)
        SQL);
    }
}
