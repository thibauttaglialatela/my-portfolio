<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordHasherInterface;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $email = 'thibaut63@hotmail.com';
        $plainPassword = 'Taglia0311';
        $user->setEmail($email);
        $user->setPassword(
            $this->userPasswordHasherInterface->hashPassword(
                $user, $plainPassword
            )
        );

        $manager->persist($user);

        $manager->flush();
    }
}
