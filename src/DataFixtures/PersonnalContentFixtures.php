<?php

namespace App\DataFixtures;

use App\Entity\PersonnalContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonnalContentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $perso = new PersonnalContent();
        $perso->setFirstname('Thibaut - Louis');
        $perso->setLastname("Taglialatela");
        $perso->setAdress("impasse Berlioz");
        $perso->setTown("Pau");
        $perso->setZipCode(64000);
        $perso->setEmail("thibauttaglialatela@gmai.com");
        $perso->setPhoneNumber("0673592383");
        $perso->setGithubLink("https://github.com/thibauttaglialatela");
        $dateNaissance = new \DateTime('23-05-1977');
        $perso->setBirthday($dateNaissance);
        $manager->persist($perso);

        $manager->flush();
    }
}
