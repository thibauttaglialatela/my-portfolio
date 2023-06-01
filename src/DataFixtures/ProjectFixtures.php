<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    const NB_PROJECT = 5;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::NB_PROJECT; $i++) {
            $project = new Project();
            $project->setName($faker->realText(50));
            $project->setDate($faker->dateTimeBetween());
            $project->setDescription($faker->paragraph());
            $project->setGithubLink($faker->url());
            $project->setWebsite($faker->url());
            $project->setImage($faker->image());
            $manager->persist($project);
        }
        $manager->flush();
    }
}
