<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260117155642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE editor (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            PRIMARY KEY(id)
        ) ENGINE=InnoDB');

        $this->addSql('CREATE TABLE book (
            id INT NOT NULL AUTO_INCREMENT,
            editor_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            isbn VARCHAR(255) NOT NULL,
            cover VARCHAR(255) NOT NULL,
            edited_at DATETIME NOT NULL,
            plot LONGTEXT NOT NULL,
            page_number INT NOT NULL,
            status VARCHAR(255) NOT NULL,
            PRIMARY KEY(id),
            INDEX IDX_CBE5A3316995AC4C (editor_id),
            CONSTRAINT FK_CBE5A3316995AC4C FOREIGN KEY (editor_id) REFERENCES editor(id)
        ) ENGINE=InnoDB');

        $this->addSql('CREATE TABLE messenger_messages (
            id BIGINT NOT NULL AUTO_INCREMENT,
            body LONGTEXT NOT NULL,
            headers LONGTEXT NOT NULL,
            queue_name VARCHAR(190) NOT NULL,
            created_at DATETIME NOT NULL,
            available_at DATETIME NOT NULL,
            delivered_at DATETIME DEFAULT NULL,
            PRIMARY KEY(id),
            INDEX IDX_75EA56E0FB7336F0 (queue_name),
            INDEX IDX_75EA56E0E3BD61CE (available_at),
            INDEX IDX_75EA56E016BA31DB (delivered_at)
        ) ENGINE=InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS messenger_messages');
        $this->addSql('DROP TABLE IF EXISTS book');
        $this->addSql('DROP TABLE IF EXISTS editor');
    }
}
