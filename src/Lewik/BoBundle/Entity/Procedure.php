<?php

namespace Lewik\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procedure
 */
class Procedure
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $customer;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $lots;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set customer
     *
     * @param string $customer
     * @return Procedure
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Procedure
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
     * Add lots
     *
     * @param \Lewik\BoBundle\Entity\Lot $lots
     * @return Procedure
     */
    public function addLot(\Lewik\BoBundle\Entity\Lot $lots)
    {
        $this->lots[] = $lots;

        return $this;
    }

    /**
     * Remove lots
     *
     * @param \Lewik\BoBundle\Entity\Lot $lots
     */
    public function removeLot(\Lewik\BoBundle\Entity\Lot $lots)
    {
        $this->lots->removeElement($lots);
    }

    /**
     * Get lots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLots()
    {
        return $this->lots;
    }
}
