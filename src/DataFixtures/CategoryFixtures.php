<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Training',
        'Degree',
        'Skills',
        'Hobby'
    ];
    public function load(ObjectManager $manager): void
    {
        foreach(self::CATEGORIES as $value) {
            $category = new Category();
            $category->setName($value);
            $manager->persist($category);
            $this->addReference("Categorie_" . $value, $category);
        }

        $manager->flush();
    }
}
