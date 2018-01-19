<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=20, unique=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=7, nullable=true)
     */
    private $couleur;

    // ...
    /**
     * Many tag have One article.
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="tags")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;
    // ...


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Tag
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Tag
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set article
     *
     * @param \AppBundle\Entity\article $article
     *
     * @return Tag
     */
    public function setArticle(\AppBundle\Entity\article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \AppBundle\Entity\article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
