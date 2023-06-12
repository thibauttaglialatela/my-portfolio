<?php

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContentFixtures extends Fixture implements DependentFixtureInterface
{
    const NB_CREATED = 5;

    const CATEGORIES = [
        'Categorie_Training',
        'Categorie_Degree',
        'Categorie_Skills',
        'Categorie_Hobby',
    ];

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        foreach(self::CATEGORIES as $category) {
            for ($i = 0; $i < self::NB_CREATED; $i++) {
                $content = new Content();
                $content->setName($faker->text(45));
                $content->setDate($faker->dateTimeBetween());
                $content->setDescription($faker->text());
                $content->setLocalisation($faker->city());
                $content->setCategory($this->getReference($category));
                $content->setImage($faker->image());
                $manager->persist($content);
            }
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
