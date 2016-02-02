<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SucursalZona
 *
 * @ORM\Table(name="sucursal_zona", indexes={@ORM\Index(name="fk_sucursal_idx", columns={"sucursal"}), @ORM\Index(name="fk_zona_idx", columns={"zona"})})
 * @ORM\Entity
 */
class SucursalZona
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
     * @var \Sucursal
     *
     * @ORM\ManyToOne(targetEntity="Sucursal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sucursal", referencedColumnName="id")
     * })
     */
    private $idSucursal;

    /**
     * @var \Zona
     *
     * @ORM\ManyToOne(targetEntity="Zona") 
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zona", referencedColumnName="id")
     * })
     */
    private $idZona;



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
     * Set idSucursal
     *
     * @param \DG\InventarioBundle\Entity\IdSucursal $idSucursal
     *
     * @return SucursalZona
     */
    public function setIdSucursal(\DG\InventarioBundle\Entity\IdSucursal $idSucursal = null)
    {
        $this->idSucursal = $idSucursal;

        return $this;
    }

    /**
     * Get idSucursal
     *
     * @return \DG\InventarioBundle\Entity\IdSucursal
     */
    public function getIdSucursal()
    {
        return $this->idSucursal;
    }

    /**
     * Set idZona
     *
     * @param \DG\InventarioBundle\Entity\IdZona $idZona
     *
     * @return SucursalZona
     */
    public function setIdZona(\DG\InventarioBundle\Entity\IdZona $idZona = null)
    {
        $this->idZona = $idZona;

        return $this;
    }

    /**
     * Get idZona
     *
     * @return \DG\InventarioBundle\Entity\IdZona
     */
    public function getIdZona()
    {
        return $this->idZona;
    }
}
