<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513124207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD escapegame_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, CHANGE noteetoile noteetoile INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A92488CD FOREIGN KEY (escapegame_id) REFERENCES escapegame (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CFBDFA14A92488CD ON note (escapegame_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CFBDFA14A76ED395 ON note (user_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A92488CD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_CFBDFA14A92488CD ON note
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_CFBDFA14A76ED395 ON note
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note DROP escapegame_id, DROP user_id, CHANGE noteetoile noteetoile VARCHAR(255) NOT NULL
        SQL);
    }
}
