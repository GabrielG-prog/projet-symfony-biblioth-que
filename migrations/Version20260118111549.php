<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260118111549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE author (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            date_of_birth DATETIME NOT NULL,
            date_of_death DATETIME DEFAULT NULL,
            nationality VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY(id)
        ) ENGINE=InnoDB');

        $this->addSql('CREATE TABLE author_book (
            author_id INT NOT NULL,
            book_id INT NOT NULL,
            PRIMARY KEY(author_id, book_id),
            INDEX IDX_AUTHOR_BOOK_AUTHOR (author_id),
            INDEX IDX_AUTHOR_BOOK_BOOK (book_id)
        ) ENGINE=InnoDB');

        $this->addSql('CREATE TABLE comment (
            id INT NOT NULL AUTO_INCREMENT,
            book_id INT NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            published_at DATETIME DEFAULT NULL,
            status VARCHAR(255) NOT NULL,
            content LONGTEXT NOT NULL,
            PRIMARY KEY(id),
            INDEX IDX_COMMENT_BOOK (book_id)
        ) ENGINE=InnoDB');

        $this->addSql('ALTER TABLE author_book 
            ADD CONSTRAINT FK_AUTHOR_BOOK_AUTHOR FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_book 
            ADD CONSTRAINT FK_AUTHOR_BOOK_BOOK FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment 
            ADD CONSTRAINT FK_COMMENT_BOOK FOREIGN KEY (book_id) REFERENCES book (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_AUTHOR_BOOK_AUTHOR');
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_AUTHOR_BOOK_BOOK');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_COMMENT_BOOK');

        $this->addSql('DROP TABLE IF EXISTS author_book');
        $this->addSql('DROP TABLE IF EXISTS comment');
        $this->addSql('DROP TABLE IF EXISTS author');
    }
}
