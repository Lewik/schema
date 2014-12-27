<?php

namespace Lewik\BoManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoFieldConfiguration
 */
class BoFieldConfiguration
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
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $length;


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
     * @return BoFieldConfiguration
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
     * @return BoFieldConfiguration
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
     * Set type
     *
     * @param string $type
     * @return BoFieldConfiguration
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return BoFieldConfiguration
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }
    /**
     * @var \Lewik\BoManagerBundle\Entity\BoConfiguration
     */
    private $bo;


    /**
     * Set bo
     *
     * @param \Lewik\BoManagerBundle\Entity\BoConfiguration $bo
     * @return BoFieldConfiguration
     */
    public function setBo(\Lewik\BoManagerBundle\Entity\BoConfiguration $bo = null)
    {
        $this->bo = $bo;

        return $this;
    }

    /**
     * Get bo
     *
     * @return \Lewik\BoManagerBundle\Entity\BoConfiguration 
     */
    public function getBo()
    {
        return $this->bo;
    }
    /**
     * @var string
     */
    private $targetEntity;

    /**
     * @var string
     */
    private $inversedBy;

    /**
     * @var string
     */
    private $mappedBy;


    /**
     * Set targetEntity
     *
     * @param string $targetEntity
     * @return BoFieldConfiguration
     */
    public function setTargetEntity($targetEntity)
    {
        $this->targetEntity = $targetEntity;

        return $this;
    }

    /**
     * Get targetEntity
     *
     * @return string 
     */
    public function getTargetEntity()
    {
        return $this->targetEntity;
    }

    /**
     * Set inversedBy
     *
     * @param string $inversedBy
     * @return BoFieldConfiguration
     */
    public function setInversedBy($inversedBy)
    {
        $this->inversedBy = $inversedBy;

        return $this;
    }

    /**
     * Get inversedBy
     *
     * @return string 
     */
    public function getInversedBy()
    {
        return $this->inversedBy;
    }

    /**
     * Set mappedBy
     *
     * @param string $mappedBy
     * @return BoFieldConfiguration
     */
    public function setMappedBy($mappedBy)
    {
        $this->mappedBy = $mappedBy;

        return $this;
    }

    /**
     * Get mappedBy
     *
     * @return string 
     */
    public function getMappedBy()
    {
        return $this->mappedBy;
    }
}
