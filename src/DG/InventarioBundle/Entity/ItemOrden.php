<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemOrden
 *
 * @ORM\Table(name="item_orden", indexes={@ORM\Index(name="fk_item_orden_orden_compra1_idx", columns={"orden_compra_id"}), @ORM\Index(name="fk_item_orden_producto1_idx", columns={"producto_id"})})
 * @ORM\Entity
 */
class ItemOrden
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
     * @ORM\Column(name="sku", type="string", length=100, nullable=true)
     */
    private $sku;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_medida", type="string", length=100, nullable=true)
     */
    private $unidadMedida;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_item", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $montoItem;

    /**
     * @var \OrdenCompra
     *
     * @ORM\ManyToOne(targetEntity="OrdenCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orden_compra_id", referencedColumnName="id")
     * })
     */
    private $ordenCompra;

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
     * @return ItemOrden
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
     * Set sku
     *
     * @param string $sku
     * @return ItemOrden
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ItemOrden
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set unidadMedida
     *
     * @param string $unidadMedida
     * @return ItemOrden
     */
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * Get unidadMedida
     *
     * @return string 
     */
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * Set montoItem
     *
     * @param string $montoItem
     * @return ItemOrden
     */
    public function setMontoItem($montoItem)
    {
        $this->montoItem = $montoItem;

        return $this;
    }

    /**
     * Get montoItem
     *
     * @return string 
     */
    public function getMontoItem()
    {
        return $this->montoItem;
    }

    /**
     * Set ordenCompra
     *
     * @param \DG\InventarioBundle\Entity\OrdenCompra $ordenCompra
     * @return ItemOrden
     */
    public function setOrdenCompra(\DG\InventarioBundle\Entity\OrdenCompra $ordenCompra = null)
    {
        $this->ordenCompra = $ordenCompra;

        return $this;
    }

    /**
     * Get ordenCompra
     *
     * @return \DG\InventarioBundle\Entity\OrdenCompra 
     */
    public function getOrdenCompra()
    {
        return $this->ordenCompra;
    }

    /**
     * Set producto
     *
     * @param \DG\InventarioBundle\Entity\Producto $producto
     * @return ItemOrden
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
}
