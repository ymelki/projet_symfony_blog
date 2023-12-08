<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Bezhanov\Faker\Provider\Science;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<100; $i++) {
            

            // use the factory to create a Faker\Generator instance
            $faker = Factory::create();
            $faker->addProvider(new Science($faker));

            $article=new Article();
            $article->setTitre($faker->scientist);
            $article->setDescription($faker->scientist);

            // $product = new Product();
            $manager->persist($article);

            $manager->flush();
        }
    }
}
