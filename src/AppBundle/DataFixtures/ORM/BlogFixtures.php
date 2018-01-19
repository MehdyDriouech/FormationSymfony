<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Article;
use AppBundle\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $article = new Article();
      $article->setActif(true);
      $article->setTitre("Symfony c'est la vie");
      $article->setDateParution(new \DateTime());
      $article->setDescription("une formation qui dépote et qui apprends des choses interessantes sur symfony cliquez ici");
      $manager->persist($article);

      $tag = new Tag();
      $tag->setLibelle("important");
      $tag->setCouleur("#abcfgh");
      $tag->setArticle($article);
      $manager->persist($tag);

      $tag = new Tag();
      $tag->setLibelle("cool");
      $tag->setCouleur("#fghcab");
      $tag->setArticle($article);
      $manager->persist($tag);

      $manager->flush();
    }
}
