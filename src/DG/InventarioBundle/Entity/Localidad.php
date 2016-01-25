<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidad
 *
 * @ORM\Table(name="localidad", indexes={@ORM\Index(name="fk_localidad_pais1_idx", columns={"pais_id1"}), @ORM\Index(name="fk_localidad_conf_tax1_idx", columns={"conf_tax_id"})})
 * @ORM\Entity
 */
class Localidad
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=50, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion1", type="string", length=200, nullable=true)
     */
    private $direccion1;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion2", type="string", length=200, nullable=true)
     */
    private $direccion2;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=100, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia_estado", type="string", length=25, nullable=true)
     */
    private $provinciaEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_zip", type="string", length=10, nullable=true)
     */
    private $postalZip;

    /**
     * @var integer
     *
     * @ORM\Column(name="pais_id", type="integer", nullable=false)
     */
    private $paisId;

    /**
     * @var \ConfTax
     *
     * @ORM\ManyToOne(targetEntity="ConfTax")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conf_tax_id", referencedColumnName="id")
     * })
     */
    private $confTax;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id1", referencedColumnName="id")
     * })
     */
    private $pais1;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Localidad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Localidad
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set direccion1
     *
     * @param string $direccion1
     * @return Localidad
     */
    public function setDireccion1($direccion1)
    {
        $this->direccion1 = $direccion1;

        return $this;
    }

    /**
     * Get direccion1
     *
     * @return string 
     */
    public function getDireccion1()
    {
        return $this->direccion1;
    }

    /**
     * Set direccion2
     *
     * @param string $direccion2
     * @return Localidad
     */
    public function setDireccion2($direccion2)
    {
        $this->direccion2 = $direccion2;

        return $this;
    }

    /**
     * Get direccion2
     *
     * @return string 
     */
    public function getDireccion2()
    {
        return $this->direccion2;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Localidad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set provinciaEstado
     *
     * @param string $provinciaEstado
     * @return Localidad
     */
    public function setProvinciaEstado($provinciaEstado)
    {
        $this->provinciaEstado = $provinciaEstado;

        return $this;
    }

    /**
     * Get provinciaEstado
     *
     * @return string 
     */
    public function getProvinciaEstado()
    {
        return $this->provinciaEstado;
    }

    /**
     * Set postalZip
     *
     * @param string $postalZip
     * @return Localidad
     */
    public function setPostalZip($postalZip)
    {
        $this->postalZip = $postalZip;

        return $this;
    }

    /**
     * Get postalZip
     *
     * @return string 
     */
    public function getPostalZip()
    {
        return $this->postalZip;
    }

    /**
     * Set paisId
     *
     * @param integer $paisId
     * @return Localidad
     */
    public function setPaisId($paisId)
    {
        $this->paisId = $paisId;

        return $this;
    }

    /**
     * Get paisId
     *
     * @return integer 
     */
    public function getPaisId()
    {
        return $this->paisId;
    }

    /**
     * Set confTax
     *
     * @param \DG\InventarioBundle\Entity\ConfTax $confTax
     * @return Localidad
     */
    public function setConfTax(\DG\InventarioBundle\Entity\ConfTax $confTax = null)
    {
        $this->confTax = $confTax;

        return $this;
    }

    /**
     * Get confTax
     *
     * @return \DG\InventarioBundle\Entity\ConfTax 
     */
    public function getConfTax()
    {
        return $this->confTax;
    }

    /**
     * Set pais1
     *
     * @param \DG\InventarioBundle\Entity\Pais $pais1
     * @return Localidad
     */
    public function setPais1(\DG\InventarioBundle\Entity\Pais $pais1 = null)
    {
        $this->pais1 = $pais1;

        return $this;
    }

    /**
     * Get pais1
     *
     * @return \DG\InventarioBundle\Entity\Pais 
     */
    public function getPais1()
    {
        return $this->pais1;
    }
}
