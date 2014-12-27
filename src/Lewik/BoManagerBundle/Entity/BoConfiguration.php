<?php

namespace Lewik\BoManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoConfiguration
 */
class BoConfiguration
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $systemName;


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
     * Set label
     *
     * @param string $label
     * @return BoConfiguration
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set systemName
     *
     * @param string $systemName
     * @return BoConfiguration
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Get systemName
     *
     * @return string 
     */
    public function getSystemName()
    {
        return $this->systemName;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fields;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fields = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fields
     *
     * @param \Lewik\BoManagerBundle\Entity\BoFieldConfiguration $fields
     * @return BoConfiguration
     */
    public function addField(\Lewik\BoManagerBundle\Entity\BoFieldConfiguration $fields)
    {
        $this->fields[] = $fields;

        return $this;
    }

    /**
     * Remove fields
     *
     * @param \Lewik\BoManagerBundle\Entity\BoFieldConfiguration $fields
     */
    public function removeField(\Lewik\BoManagerBundle\Entity\BoFieldConfiguration $fields)
    {
        $this->fields->removeElement($fields);
    }

    /**
     * Get fields
     *
     * @return \Doctrine\Common\Collections\Collection|BoFieldConfiguration[]
     */
    public function getFields()
    {
        return $this->fields;
    }
}
