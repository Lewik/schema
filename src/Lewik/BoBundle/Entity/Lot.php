<?php

namespace Lewik\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lot
 */
class Lot
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var varchar
     */
    private $posiitons;

    /**
     * @var varchar
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set posiitons
     *
     * @param \varchar $posiitons
     * @return Lot
     */
    public function setPosiitons(\varchar $posiitons)
    {
        $this->posiitons = $posiitons;

        return $this;
    }

    /**
     * Get posiitons
     *
     * @return \varchar 
     */
    public function getPosiitons()
    {
        return $this->posiitons;
    }

    /**
     * Set name
     *
     * @param \varchar $name
     * @return Lot
     */
    public function setName(\varchar $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return \varchar 
     */
    public function getName()
    {
        return $this->name;
    }
}
