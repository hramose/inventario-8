<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empaque
 *
 * @ORM\Table(name="empaque")
 * @ORM\Entity
 */
class Empaque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="empaque", type="boolean", nullable=true)
     */
    private $empaque;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="text", length=65535, nullable=true)
     */
    private $nota;



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
     * Set empaque
     *
     * @param boolean $empaque
     * @return Empaque
     */
    public function setEmpaque($empaque)
    {
        $this->empaque = $empaque;

        return $this;
    }

    /**
     * Get empaque
     *
     * @return boolean 
     */
    public function getEmpaque()
    {
        return $this->empaque;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Empaque
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }
}
