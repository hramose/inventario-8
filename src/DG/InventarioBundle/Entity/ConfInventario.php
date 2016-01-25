<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfInventario
 *
 * @ORM\Table(name="conf_inventario")
 * @ORM\Entity
 */
class ConfInventario
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
     * @var boolean
     *
     * @ORM\Column(name="costo", type="boolean", nullable=true)
     */
    private $costo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponibilidad_total", type="boolean", nullable=true)
     */
    private $disponibilidadTotal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oferta", type="boolean", nullable=true)
     */
    private $oferta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="imagen_producto", type="boolean", nullable=true)
     */
    private $imagenProducto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="imagen_cotizacion", type="boolean", nullable=true)
     */
    private $imagenCotizacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="imagen_factura", type="boolean", nullable=true)
     */
    private $imagenFactura;



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
     * Set costo
     *
     * @param boolean $costo
     * @return ConfInventario
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return boolean 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set disponibilidadTotal
     *
     * @param boolean $disponibilidadTotal
     * @return ConfInventario
     */
    public function setDisponibilidadTotal($disponibilidadTotal)
    {
        $this->disponibilidadTotal = $disponibilidadTotal;

        return $this;
    }

    /**
     * Get disponibilidadTotal
     *
     * @return boolean 
     */
    public function getDisponibilidadTotal()
    {
        return $this->disponibilidadTotal;
    }

    /**
     * Set oferta
     *
     * @param boolean $oferta
     * @return ConfInventario
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get oferta
     *
     * @return boolean 
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set imagenProducto
     *
     * @param boolean $imagenProducto
     * @return ConfInventario
     */
    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;

        return $this;
    }

    /**
     * Get imagenProducto
     *
     * @return boolean 
     */
    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }

    /**
     * Set imagenCotizacion
     *
     * @param boolean $imagenCotizacion
     * @return ConfInventario
     */
    public function setImagenCotizacion($imagenCotizacion)
    {
        $this->imagenCotizacion = $imagenCotizacion;

        return $this;
    }

    /**
     * Get imagenCotizacion
     *
     * @return boolean 
     */
    public function getImagenCotizacion()
    {
        return $this->imagenCotizacion;
    }

    /**
     * Set imagenFactura
     *
     * @param boolean $imagenFactura
     * @return ConfInventario
     */
    public function setImagenFactura($imagenFactura)
    {
        $this->imagenFactura = $imagenFactura;

        return $this;
    }

    /**
     * Get imagenFactura
     *
     * @return boolean 
     */
    public function getImagenFactura()
    {
        return $this->imagenFactura;
    }
}
