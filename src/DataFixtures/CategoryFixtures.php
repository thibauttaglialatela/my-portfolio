<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = [
        'reward',
        'skill',
        'formation',
        'hobby'
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORY as $key => $categoryName) {
             $category = new Category();
             $category->setName($categoryName);
             $this->addReference('category_' . $key, $category);

             $manager->persist($category);
        }


        $manager->flush();
    }
}
