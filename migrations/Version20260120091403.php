<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260120091403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book ADD created_by_id INT NOT NULL DEFAULT 1');

        $this->addSql('ALTER TABLE book 
            ADD CONSTRAINT FK_CBE5A331B03A8386 
            FOREIGN KEY (created_by_id) REFERENCES user (id)');

        $this->addSql('CREATE INDEX IDX_CBE5A331B03A8386 ON book (created_by_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331B03A8386');
        $this->addSql('DROP INDEX IDX_CBE5A331B03A8386 ON book');
        $this->addSql('ALTER TABLE book DROP created_by_id');
    }
}
