<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Tag;
use AppBundle\Entity\User;
use AppBundle\Form\TagType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/", name="blog_accueil")
     */
    public function blogAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articleRepository = $em->getRepository(Article::class);

        $articles = $articleRepository->findBy([
            "actif" => true
        ]);

        return $this->render('Blog/index.html.twig', [
            "articles" => $articles,
        ]);
    }

    /**
     * @Route("/tag/créer", name="create_tag")
     */
    public function blogCreateTagAction(Request $request)
    {
        $form = $this->createForm(TagType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $tag = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute("blog_accueil");
        }

        return $this->render('Blog/Tag/create.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/tag/{id}/supprimer", name="remove_tag")
     * @ParamConverter("tag", class="AppBundle:Tag")
     */
    public function deleteTag(Request $request, Tag $tag)
    {
        /** @var User $user */
        $user = $this->getUser();
        if(!$user->hasRole("ROLE_ADMIN")){
            $this->addFlash(
                'danger',
                "Vous n'avez pas accès à cette ressource"
            );
            return $this->redirectToRoute("blog_accueil");
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();

        return $this->redirectToRoute("blog_accueil");
    }
}
