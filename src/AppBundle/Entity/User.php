<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="float",name="taille_user",nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="float",name="banane",nullable=true)
     */
    private $banane;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get the value of Taille
     *
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set the value of Taille
     *
     * @param mixed taille
     *
     * @return self
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }


    /**
     * Set banane
     *
     * @param float $banane
     *
     * @return User
     */
    public function setBanane($banane)
    {
        $this->banane = $banane;

        return $this;
    }

    /**
     * Get banane
     *
     * @return float
     */
    public function getBanane()
    {
        return $this->banane;
    }
}
