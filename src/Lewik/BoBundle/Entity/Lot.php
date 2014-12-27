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
     * @var \Lewik\BoBundle\Entity\Procedure
     */
    private $procedure;


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

    /**
     * Set procedure
     *
     * @param \Lewik\BoBundle\Entity\Procedure $procedure
     * @return Lot
     */
    public function setProcedure(\Lewik\BoBundle\Entity\Procedure $procedure = null)
    {
        $this->procedure = $procedure;

        return $this;
    }

    /**
     * Get procedure
     *
     * @return \Lewik\BoBundle\Entity\Procedure 
     */
    public function getProcedure()
    {
        return $this->procedure;
    }
}
