<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use AppBundle\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BlogFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setActif(true);
        $article->setTitre("Accident de Millas : l'enquête accable la conductrice");
        $article->setDateParution(new \DateTime("+ 5 days"));
        $article->setDescription("On sait que le train roulait à 75 km/h, une allure tout à fait normale. Le bus, lui, roulait à 12 km/h, et les relevés de son enregistreur de vitesse montrent qu'il n'a pas freiné. Selon Franceinfo, des traces de frottement sur l'avant du bus iraient également dans le sens d'une collision avec les barrières. Peu de temps après le drame, la SNCF avait affirmé que le passage à niveau était en parfait état de marche, que ce soit au niveau du signal sonore, des feux d'avertissement ou des barrières. Des contre-expertises sont prévues pour les prochains jours.");
        $manager->persist($article);

        $tag = new Tag();
        $tag->setLibelle("Accident");
        $tag->setCouleur("#EE9389");
        $tag->setArticle($article);
        $manager->persist($tag);

        $tag = new Tag();
        $tag->setLibelle("Important");
        $tag->setCouleur("#BCC938");
        $tag->setArticle($article);
        $manager->persist($tag);

        $manager->flush();
    }
}