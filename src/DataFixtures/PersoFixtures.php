<?php

namespace App\DataFixtures;

use App\Entity\PersonnalContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $personnalContent = new PersonnalContent();


        $personnalContent->setFirstname('Thibaut - Louis');
        $personnalContent->setLastname('Taglialatela');
        $personnalContent->setBirthday(new \DateTime('1977-05-23'));
        $personnalContent->setAdress('1 impasse Berlioz');
        $personnalContent->setTown('Pau');
        $personnalContent->setZipCode(64000);
        $personnalContent->setPhoneNumber('+33673592383');
        $personnalContent->setEmail('thibauttaglialatela@gmail.com');
        $personnalContent->setGithubLink('https://github.com/thibauttaglialatela');
        $personnalContent->setLinkedin('https://www.linkedin.com/in/thibauttaglialatela/');
        $personnalContent->setPicture('https://picsum.photos/id/177/200/300');
        $manager->persist($personnalContent);

        $manager->flush();
    }
}
