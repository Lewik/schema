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
     * @var varchar
     */
    private $customer;

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
     * Set customer
     *
     * @param \varchar $customer
     * @return Procedure
     */
    public function setCustomer(\varchar $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \varchar 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set name
     *
     * @param \varchar $name
     * @return Procedure
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
