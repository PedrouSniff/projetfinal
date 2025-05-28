<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250528080606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C426ED0855
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_D9BEC0C426ED0855 ON commentaires
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires CHANGE note_id commentaire_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES note (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_D9BEC0C4BA9CD190 ON commentaires (commentaire_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4BA9CD190
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_D9BEC0C4BA9CD190 ON commentaires
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires CHANGE commentaire_id note_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C426ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_D9BEC0C426ED0855 ON commentaires (note_id)
        SQL);
    }
}
