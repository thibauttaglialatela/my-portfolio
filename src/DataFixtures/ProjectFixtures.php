<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    public const PROJECT_NUM = 5;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::PROJECT_NUM; $i++) {
            $project = new Project();
            $project->setName($faker->word());
            $project->setDescription($faker->realText());
            $project->setDate($faker->dateTimeBetween('- 6 months', 'now'));
            $project->setGithubLink($faker->url());
            $project->setImage($faker->imageUrl());
            $project->setWebsite($faker->url());

            $manager->persist($project);

        }


        $manager->flush();
    }
}
