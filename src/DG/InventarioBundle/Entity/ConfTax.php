<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfTax
 *
 * @ORM\Table(name="conf_tax")
 * @ORM\Entity
 */
class ConfTax
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
     * @var string
     *
     * @ORM\Column(name="nombre_tax", type="string", length=200, nullable=true)
     */
    private $nombreTax;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_registro", type="integer", nullable=true)
     */
    private $numeroRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentaje", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $porcentaje;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;



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
     * Set nombreTax
     *
     * @param string $nombreTax
     * @return ConfTax
     */
    public function setNombreTax($nombreTax)
    {
        $this->nombreTax = $nombreTax;

        return $this;
    }

    /**
     * Get nombreTax
     *
     * @return string 
     */
    public function getNombreTax()
    {
        return $this->nombreTax;
    }

    /**
     * Set numeroRegistro
     *
     * @param integer $numeroRegistro
     * @return ConfTax
     */
    public function setNumeroRegistro($numeroRegistro)
    {
        $this->numeroRegistro = $numeroRegistro;

        return $this;
    }

    /**
     * Get numeroRegistro
     *
     * @return integer 
     */
    public function getNumeroRegistro()
    {
        return $this->numeroRegistro;
    }

    /**
     * Set porcentaje
     *
     * @param string $porcentaje
     * @return ConfTax
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return string 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return ConfTax
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
     public function __toString() {
    //return $this->cargo ? $this->cargo : '';
    return $this->getNombreTax().' ';
    }
}
