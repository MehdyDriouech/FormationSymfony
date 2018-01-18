<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $user = new User();
      $user->setUsername("toto");
      $user->setEmail("toto@toto.fr");
      $user->setPlainPassword("admin");

      $manager->persist($user);
      $manager->flush();
    }
}
