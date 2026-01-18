<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Comment;
use App\Entity\Editor;
use App\Enum\BookStatus;
use App\Enum\CommentStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $statuses = [
            BookStatus::Available,
            BookStatus::Borrowed,
            BookStatus::Unavailable,
        ];

        $editors = [];
        for ($i = 0; $i < 10; $i++) {
            $editor = new Editor();
            $editor->setName($faker->company());
            $manager->persist($editor);
            $editors[] = $editor;
        }

        $authors = [];
        for ($i = 0; $i < 30; $i++) {
            $author = new Author();
            $author->setName($faker->unique()->name());
            $dob = $faker->dateTimeBetween('-80 years', '-20 years');
            $author->setDateOfBirth(\DateTimeImmutable::createFromMutable($dob));
            if (rand(1, 100) <= 20) {
                $dod = $faker->dateTimeBetween($dob, 'now');
                $author->setDateOfDeath(\DateTimeImmutable::createFromMutable($dod));
            }
            $author->setNationality($faker->country());
            $manager->persist($author);
            $authors[] = $author;
        }

        $books = [];
        for ($i = 0; $i < 100; $i++) {
            $book = new Book();
            $book->setTitle($faker->sentence(3));
            $book->setIsbn($faker->isbn13());
            $book->setCover($faker->imageUrl(200, 300, 'books'));
            $book->setEditedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-5 years', 'now')));
            $book->setPlot($faker->paragraph(5));
            $book->setPageNumber($faker->numberBetween(50, 1000));
            $book->setStatus($faker->randomElement($statuses));

            $book->setEditor($faker->randomElement($editors));

            $book->addAuthor($faker->randomElement($authors));
            if (rand(1, 100) <= 30) {
                $book->addAuthor($faker->randomElement($authors));
            }

            $manager->persist($book);
            $books[] = $book;
        }

        for ($i = 0; $i < 300; $i++) {
            $comment = new Comment();
            $comment->setName($faker->name());
            $comment->setEmail($faker->email());
            $comment->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 years', 'now')));
            if (rand(1, 100) <= 50) {
                $comment->setPublishedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 years', 'now')));
            }

            $statuses = array_map(fn(CommentStatus $c) => $c->value, CommentStatus::cases());
            
            $comment->setStatus($faker->randomElement($statuses));
            $comment->setContent($faker->paragraph());
            $comment->setBook($faker->randomElement($books));

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
