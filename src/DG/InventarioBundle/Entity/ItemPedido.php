<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPedido
 *
 * @ORM\Table(name="item_pedido", indexes={@ORM\Index(name="fk_item_pedido_pedido1_idx", columns={"pedido_id"})})
 * @ORM\Entity
 */
class ItemPedido
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
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     * })
     */
    private $pedido;



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
     * @return ItemPedido
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
     * @return ItemPedido
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
     * @return ItemPedido
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
     * @return ItemPedido
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
     * @return ItemPedido
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
     * Set pedido
     *
     * @param \DG\InventarioBundle\Entity\Pedido $pedido
     * @return ItemPedido
     */
    public function setPedido(\DG\InventarioBundle\Entity\Pedido $pedido = null)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return \DG\InventarioBundle\Entity\Pedido 
     */
    public function getPedido()
    {
        return $this->pedido;
    }
}
