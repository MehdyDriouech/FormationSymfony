<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="BlogPage")
     */
    public function blogAction(Request $request)
    {


      $em = $this->getDoctrine()->getManager();
      $articleRepository = $em->getRepository(Article::class);

      $articles = $articleRepository -> findBy([
        "actif" => true
      ]);

      // dump($articles); die;
        // replace this example code with whatever you need
        return $this->render('Blog/index.html.twig', [
            "articles" => $articles,
        ]);
    }
}
