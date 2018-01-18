<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserLoadData extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $user = new User();

      $manager->persist($user);
      $manager->flush;
    }
}
