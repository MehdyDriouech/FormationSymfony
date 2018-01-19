<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Tag;
use AppBundle\Form\TagType;
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
        $form = $this->createForm(TagType::class);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $tag = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em -> persist($tag);
            $em -> flush();

            return $this->redirectToRoute("BlogPage");
        }

        return $this->render('Blog/Tag/create.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/blog/tag/{id}/supprimer", name="remove_tag")
     */
    public function removeTag(Request $request, Tag $tag)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();

        return $this->redirectToRoute("BlogPage");
    }




}
