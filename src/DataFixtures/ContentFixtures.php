<?php

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContentFixtures extends Fixture implements DependentFixtureInterface
{
    public const CATEGORY_NUM = 4;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::CATEGORY_NUM; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $content = new Content();
                $content->setName($faker->word());
                $content->setDate($faker->dateTime);
                $content->setDescription($faker->realText());
                $content->setLocalisation($faker->city());
                $content->setCategory($this->getReference('category_' . $i));

                $manager->persist($content);
            }
        }


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];

    }

}
