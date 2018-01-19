<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("mehdy");
        $user->setEmail("mehdy@test.fr");
        $user->setPlainPassword("admin");
        $user->setEnabled(true);
        $user->addRole("ROLE_ADMIN");

        $manager->persist($user);
        $manager->flush();
    }
}