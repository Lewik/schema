<?php

namespace Lewik\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test1419184895
 */
class Test1419184895
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $asdsdsadsadsa;


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
     * Set asdsdsadsadsa
     *
     * @param string $asdsdsadsadsa
     * @return Test1419184895
     */
    public function setAsdsdsadsadsa($asdsdsadsadsa)
    {
        $this->asdsdsadsadsa = $asdsdsadsadsa;

        return $this;
    }

    /**
     * Get asdsdsadsadsa
     *
     * @return string 
     */
    public function getAsdsdsadsadsa()
    {
        return $this->asdsdsadsadsa;
    }
}
