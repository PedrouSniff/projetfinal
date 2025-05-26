<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513131533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE etoilenote (id INT AUTO_INCREMENT NOT NULL, etoile INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD etoilenote_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD CONSTRAINT FK_CFBDFA144CE7D344 FOREIGN KEY (etoilenote_id) REFERENCES etoilenote (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CFBDFA144CE7D344 ON note (etoilenote_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA144CE7D344
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE etoilenote
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_CFBDFA144CE7D344 ON note
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP etoilenote_id
        SQL);
    }
}
