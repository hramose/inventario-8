<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="fk_cotizacion_usuario1_idx", columns={"usuario_id"}), @ORM\Index(name="fk_cotizacion_conftax1_idx", columns={"conftax_id"}), @ORM\Index(name="fk_cotizacion_producto1_idx", columns={"producto_id"}), @ORM\Index(name="fk_pedido_confpedido1_idx", columns={"confpedido_id"}), @ORM\Index(name="fk_pedido_status1_idx", columns={"status_id"})})
 * @ORM\Entity
 */
class Pedido
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=true)
     */
    private $fechaEmision;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_caducidad", type="string", length=45, nullable=true)
     */
    private $fechaCaducidad;

    /**
     * @var string
     *
     * @ORM\Column(name="aclaracion", type="string", length=45, nullable=true)
     */
    private $aclaracion;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="string", length=1000, nullable=true)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_envio", type="string", length=200, nullable=true)
     */
    private $direccionEnvio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="condicion_pago", type="string", length=45, nullable=true)
     */
    private $condicionPago;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="string", length=45, nullable=true)
     */
    private $nota;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_actual", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $taxActual;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_total", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $montoTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_total", type="integer", nullable=true)
     */
    private $cantidadTotal;

    /**
     * @var \ConfTax
     *
     * @ORM\ManyToOne(targetEntity="ConfTax")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conftax_id", referencedColumnName="id")
     * })
     */
    private $conftax;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * })
     */
    private $producto;

    /**
     * @var \UsuarioSistema
     *
     * @ORM\ManyToOne(targetEntity="UsuarioSistema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \ConFactura
     *
     * @ORM\ManyToOne(targetEntity="ConFactura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="confpedido_id", referencedColumnName="id")
     * })
     */
    private $confpedido;

    /**
     * @var \Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;



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
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     * @return Pedido
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime 
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set fechaCaducidad
     *
     * @param string $fechaCaducidad
     * @return Pedido
     */
    public function setFechaCaducidad($fechaCaducidad)
    {
        $this->fechaCaducidad = $fechaCaducidad;

        return $this;
    }

    /**
     * Get fechaCaducidad
     *
     * @return string 
     */
    public function getFechaCaducidad()
    {
        return $this->fechaCaducidad;
    }

    /**
     * Set aclaracion
     *
     * @param string $aclaracion
     * @return Pedido
     */
    public function setAclaracion($aclaracion)
    {
        $this->aclaracion = $aclaracion;

        return $this;
    }

    /**
     * Get aclaracion
     *
     * @return string 
     */
    public function getAclaracion()
    {
        return $this->aclaracion;
    }

    /**
     * Set resumen
     *
     * @param string $resumen
     * @return Pedido
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
     * Set direccionEnvio
     *
     * @param string $direccionEnvio
     * @return Pedido
     */
    public function setDireccionEnvio($direccionEnvio)
    {
        $this->direccionEnvio = $direccionEnvio;

        return $this;
    }

    /**
     * Get direccionEnvio
     *
     * @return string 
     */
    public function getDireccionEnvio()
    {
        return $this->direccionEnvio;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Pedido
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

    /**
     * Set condicionPago
     *
     * @param string $condicionPago
     * @return Pedido
     */
    public function setCondicionPago($condicionPago)
    {
        $this->condicionPago = $condicionPago;

        return $this;
    }

    /**
     * Get condicionPago
     *
     * @return string 
     */
    public function getCondicionPago()
    {
        return $this->condicionPago;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Pedido
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

    /**
     * Set taxActual
     *
     * @param string $taxActual
     * @return Pedido
     */
    public function setTaxActual($taxActual)
    {
        $this->taxActual = $taxActual;

        return $this;
    }

    /**
     * Get taxActual
     *
     * @return string 
     */
    public function getTaxActual()
    {
        return $this->taxActual;
    }

    /**
     * Set montoTotal
     *
     * @param string $montoTotal
     * @return Pedido
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
     * Set cantidadTotal
     *
     * @param integer $cantidadTotal
     * @return Pedido
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
     * Set conftax
     *
     * @param \DG\InventarioBundle\Entity\ConfTax $conftax
     * @return Pedido
     */
    public function setConftax(\DG\InventarioBundle\Entity\ConfTax $conftax = null)
    {
        $this->conftax = $conftax;

        return $this;
    }

    /**
     * Get conftax
     *
     * @return \DG\InventarioBundle\Entity\ConfTax 
     */
    public function getConftax()
    {
        return $this->conftax;
    }

    /**
     * Set producto
     *
     * @param \DG\InventarioBundle\Entity\Producto $producto
     * @return Pedido
     */
    public function setProducto(\DG\InventarioBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \DG\InventarioBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set usuario
     *
     * @param \DG\InventarioBundle\Entity\UsuarioSistema $usuario
     * @return Pedido
     */
    public function setUsuario(\DG\InventarioBundle\Entity\UsuarioSistema $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \DG\InventarioBundle\Entity\UsuarioSistema 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set confpedido
     *
     * @param \DG\InventarioBundle\Entity\ConFactura $confpedido
     * @return Pedido
     */
    public function setConfpedido(\DG\InventarioBundle\Entity\ConFactura $confpedido = null)
    {
        $this->confpedido = $confpedido;

        return $this;
    }

    /**
     * Get confpedido
     *
     * @return \DG\InventarioBundle\Entity\ConFactura 
     */
    public function getConfpedido()
    {
        return $this->confpedido;
    }

    /**
     * Set status
     *
     * @param \DG\InventarioBundle\Entity\Status $status
     * @return Pedido
     */
    public function setStatus(\DG\InventarioBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \DG\InventarioBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
