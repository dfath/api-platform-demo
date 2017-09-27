<?php

namespace Suteki\Siakad\AcmeBundle\DataFixtures\ORM;

use Suteki\Siakad\AcmeBundle\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadBookData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i=0; $i < 20; $i++) {
          $book = new Book;
          $book->setTitle($faker->realText(50, 1));
          $book->setIsbn($faker->isbn13);
          $book->setDescription($faker->text);
          $book->setAuthor($faker->name);
          $book->setPublicationDate($faker->dateTime);
          $manager->persist($book);
        }
        $manager->flush();
    }
}
