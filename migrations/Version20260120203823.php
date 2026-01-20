<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260120203823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book MODIFY created_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD last_connected_at DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book MODIFY created_by_id INT NOT NULL DEFAULT 1');
        $this->addSql('ALTER TABLE user DROP COLUMN last_connected_at');
    }
}
