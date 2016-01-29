<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConFactura
 *
 * @ORM\Table(name="con_factura", indexes={@ORM\Index(name="fk_confactura_moneda1_idx", columns={"moneda_id"})})
 * @ORM\Entity
 */
class ConFactura
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
     * @ORM\Column(name="termino_pago", type="string", length=200, nullable=true)
     */
    private $terminoPago;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=25, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ver_sku", type="boolean", nullable=true)
     */
    private $verSku;

    /**
     * @var integer
     *
     * @ORM\Column(name="vencimiento", type="integer", nullable=true)
     */
    private $vencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_factura", type="string", length=100, nullable=true)
     */
    private $nombreFactura;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_cotizacion", type="string", length=100, nullable=true)
     */
    private $nombreCotizacion;

    /**
     * @var \Moneda
     *
     * @ORM\ManyToOne(targetEntity="Moneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moneda_id", referencedColumnName="id")
     * })
     */
    private $moneda;



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
     * Set terminoPago
     *
     * @param string $terminoPago
     * @return ConFactura
     */
    public function setTerminoPago($terminoPago)
    {
        $this->terminoPago = $terminoPago;

        return $this;
    }

    /**
     * Get terminoPago
     *
     * @return string 
     */
    public function getTerminoPago()
    {
        return $this->terminoPago;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ConFactura
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return ConFactura
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return ConFactura
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set verSku
     *
     * @param boolean $verSku
     * @return ConFactura
     */
    public function setVerSku($verSku)
    {
        $this->verSku = $verSku;

        return $this;
    }

    /**
     * Get verSku
     *
     * @return boolean 
     */
    public function getVerSku()
    {
        return $this->verSku;
    }

    /**
     * Set vencimiento
     *
     * @param integer $vencimiento
     * @return ConFactura
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return integer 
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set nombreFactura
     *
     * @param string $nombreFactura
     * @return ConFactura
     */
    public function setNombreFactura($nombreFactura)
    {
        $this->nombreFactura = $nombreFactura;

        return $this;
    }

    /**
     * Get nombreFactura
     *
     * @return string 
     */
    public function getNombreFactura()
    {
        return $this->nombreFactura;
    }

    /**
     * Set nombreCotizacion
     *
     * @param string $nombreCotizacion
     * @return ConFactura
     */
    public function setNombreCotizacion($nombreCotizacion)
    {
        $this->nombreCotizacion = $nombreCotizacion;

        return $this;
    }

    /**
     * Get nombreCotizacion
     *
     * @return string 
     */
    public function getNombreCotizacion()
    {
        return $this->nombreCotizacion;
    }

    /**
     * Set moneda
     *
     * @param \DG\InventarioBundle\Entity\Moneda $moneda
     * @return ConFactura
     */
    public function setMoneda(\DG\InventarioBundle\Entity\Moneda $moneda = null)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return \DG\InventarioBundle\Entity\Moneda 
     */
    public function getMoneda()
    {
        return $this->moneda;
    }
}
