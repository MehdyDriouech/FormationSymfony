<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    /**
     * @Route("/blog/tag/create", name="create_tag")
     */
    public function blogAction(Request $request)
    {
        return $this->render('Blog/Tag/create.html.twig ', [
        ]);
    }
}
