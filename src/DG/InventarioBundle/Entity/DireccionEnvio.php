<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DireccionEnvio
 *
 * @ORM\Table(name="direccion_envio", indexes={@ORM\Index(name="fk_direccion_envio_cuenta1_idx", columns={"cuenta_id"})})
 * @ORM\Entity
 */
class DireccionEnvio
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
     * @ORM\Column(name="direccion1", type="string", length=400, nullable=true)
     */
    private $direccion1;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion2", type="string", length=400, nullable=true)
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
     * @ORM\Column(name="provincia_estado", type="string", length=100, nullable=true)
     */
    private $provinciaEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_zip", type="string", length=15, nullable=true)
     */
    private $postalZip;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta" , inversedBy="cuenta", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_id", referencedColumnName="id")
     * })
     */
    private $cuenta;



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
     * Set direccion1
     *
     * @param string $direccion1
     * @return DireccionEnvio
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
     * @return DireccionEnvio
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
     * @return DireccionEnvio
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
     * @return DireccionEnvio
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
     * @return DireccionEnvio
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
     * Set cuenta
     *
     * @param \DG\InventarioBundle\Entity\Cuenta $cuenta
     * @return DireccionEnvio
     */
    public function setCuenta(\DG\InventarioBundle\Entity\Cuenta $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \DG\InventarioBundle\Entity\Cuenta 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
}
