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
     * @var string
     */
    private $positons;

    /**
     * @var string
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
     * Set positons
     *
     * @param string $positons
     * @return Lot
     */
    public function setPositons($positons)
    {
        $this->positons = $positons;

        return $this;
    }

    /**
     * Get positons
     *
     * @return string 
     */
    public function getPositons()
    {
        return $this->positons;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Lot
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
