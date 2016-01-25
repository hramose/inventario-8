<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota", indexes={@ORM\Index(name="fk_nota_pedido1_idx", columns={"pedido_id"}), @ORM\Index(name="fk_nota_orden_compra1_idx", columns={"orden_compra_id"})})
 * @ORM\Entity
 */
class Nota
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
     * @ORM\Column(name="nota", type="text", length=65535, nullable=true)
     */
    private $nota;

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
     * Set nota
     *
     * @param string $nota
     * @return Nota
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
     * Set ordenCompra
     *
     * @param \DG\InventarioBundle\Entity\OrdenCompra $ordenCompra
     * @return Nota
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
     * Set pedido
     *
     * @param \DG\InventarioBundle\Entity\Pedido $pedido
     * @return Nota
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
