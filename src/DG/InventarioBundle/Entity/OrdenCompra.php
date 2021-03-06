<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdenCompra
 *
 * @ORM\Table(name="orden_compra", indexes={@ORM\Index(name="fk_orden_compra_usuario_sistema1_idx", columns={"usuario_sistema_id"})})
 * @ORM\Entity
 */
class OrdenCompra
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
     * @ORM\Column(name="numero_orden", type="string", length=100, nullable=true)
     */
    private $numeroOrden;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="text", length=65535, nullable=true)
     */
    private $resumen;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_total", type="integer", nullable=true)
     */
    private $cantidadTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_total", type="string", length=45, nullable=true)
     */
    private $montoTotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var \UsuarioSistema
     *
     * @ORM\ManyToOne(targetEntity="UsuarioSistema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_sistema_id", referencedColumnName="id")
     * })
     */
    private $usuarioSistema;



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
     * Set numeroOrden
     *
     * @param string $numeroOrden
     * @return OrdenCompra
     */
    public function setNumeroOrden($numeroOrden)
    {
        $this->numeroOrden = $numeroOrden;

        return $this;
    }

    /**
     * Get numeroOrden
     *
     * @return string 
     */
    public function getNumeroOrden()
    {
        return $this->numeroOrden;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return OrdenCompra
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set resumen
     *
     * @param string $resumen
     * @return OrdenCompra
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string 
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set cantidadTotal
     *
     * @param integer $cantidadTotal
     * @return OrdenCompra
     */
    public function setCantidadTotal($cantidadTotal)
    {
        $this->cantidadTotal = $cantidadTotal;

        return $this;
    }

    /**
     * Get cantidadTotal
     *
     * @return integer 
     */
    public function getCantidadTotal()
    {
        return $this->cantidadTotal;
    }

    /**
     * Set montoTotal
     *
     * @param string $montoTotal
     * @return OrdenCompra
     */
    public function setMontoTotal($montoTotal)
    {
        $this->montoTotal = $montoTotal;

        return $this;
    }

    /**
     * Get montoTotal
     *
     * @return string 
     */
    public function getMontoTotal()
    {
        return $this->montoTotal;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return OrdenCompra
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set usuarioSistema
     *
     * @param \DG\InventarioBundle\Entity\UsuarioSistema $usuarioSistema
     * @return OrdenCompra
     */
    public function setUsuarioSistema(\DG\InventarioBundle\Entity\UsuarioSistema $usuarioSistema = null)
    {
        $this->usuarioSistema = $usuarioSistema;

        return $this;
    }

    /**
     * Get usuarioSistema
     *
     * @return \DG\InventarioBundle\Entity\UsuarioSistema 
     */
    public function getUsuarioSistema()
    {
        return $this->usuarioSistema;
    }
}
