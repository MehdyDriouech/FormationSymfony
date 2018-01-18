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
     */
    protected $id;


    /**
     * @ORM\Column(type="float",name="taille_user",nullable=tur)
     */
    private $taille;

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

}
