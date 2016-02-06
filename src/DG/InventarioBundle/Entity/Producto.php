<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Producto
 *
 * @ORM\Table(name="producto", indexes={@ORM\Index(name="fk_producto_catproducto1_idx", columns={"catproducto_id"}), @ORM\Index(name="fk_producto_zona1_idx", columns={"zona_id"}), @ORM\Index(name="fk_producto_unidades1_idx", columns={"unidades_id"}), @ORM\Index(name="fk_producto_cuenta1_idx", columns={"cuenta_id"}), @ORM\Index(name="fk_producto_tipo_inventario1_idx", columns={"tipo_inventario_id"})})
 * @ORM\Entity
 */
class Producto
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_compra", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $precioCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_venta", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $precioVenta;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=100, nullable=true)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=100, nullable=true)
     */
    private $serial;

    /**
     * @var integer
     *
     * @ORM\Column(name="inventario_bajo", type="integer", nullable=true)
     */
    private $inventarioBajo;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_existencia", type="integer", nullable=true)
     */
    private $totalExistencia;
    

    /**
     * @var \Catproducto
     *
     * @ORM\ManyToOne(targetEntity="Catproducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catproducto_id", referencedColumnName="id")
     * })
     */
    private $catproducto;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_id", referencedColumnName="id")
     * })
     */
    private $cuenta;

    /**
     * @var \TipoInventario
     *
     * @ORM\ManyToOne(targetEntity="TipoInventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_inventario_id", referencedColumnName="id")
     * })
     */
    private $tipoInventario;

    /**
     * @var \UnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="UnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidades_id", referencedColumnName="id")
     * })
     */
    private $unidades;

    /**
     * @var \Zona
     *
     * @ORM\ManyToOne(targetEntity="Zona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     * })
     */
    private $zona;



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
     * @return Producto
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Producto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precioCompra
     *
     * @param string $precioCompra
     * @return Producto
     */
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    /**
     * Get precioCompra
     *
     * @return string 
     */
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    /**
     * Set precioVenta
     *
     * @param string $precioVenta
     * @return Producto
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;

        return $this;
    }

    /**
     * Get precioVenta
     *
     * @return string 
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Producto
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
     * Set serial
     *
     * @param string $serial
     * @return Producto
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set inventarioBajo
     *
     * @param integer $inventarioBajo
     * @return Producto
     */
    public function setInventarioBajo($inventarioBajo)
    {
        $this->inventarioBajo = $inventarioBajo;

        return $this;
    }

    /**
     * Get inventarioBajo
     *
     * @return integer 
     */
    public function getInventarioBajo()
    {
        return $this->inventarioBajo;
    }

    /**
     * Set totalExistencia
     *
     * @param integer $totalExistencia
     * @return Producto
     */
    public function setTotalExistencia($totalExistencia)
    {
        $this->totalExistencia = $totalExistencia;

        return $this;
    }

    /**
     * Get totalExistencia
     *
     * @return integer 
     */
    public function getTotalExistencia()
    {
        return $this->totalExistencia;
    }
    

    /**
     * Set catproducto
     *
     * @param \DG\InventarioBundle\Entity\Catproducto $catproducto
     * @return Producto
     */
    public function setCatproducto(\DG\InventarioBundle\Entity\Catproducto $catproducto = null)
    {
        $this->catproducto = $catproducto;

        return $this;
    }

    /**
     * Get catproducto
     *
     * @return \DG\InventarioBundle\Entity\Catproducto 
     */
    public function getCatproducto()
    {
        return $this->catproducto;
    }

    /**
     * Set cuenta
     *
     * @param \DG\InventarioBundle\Entity\Cuenta $cuenta
     * @return Producto
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

    /**
     * Set tipoInventario
     *
     * @param \DG\InventarioBundle\Entity\TipoInventario $tipoInventario
     * @return Producto
     */
    public function setTipoInventario(\DG\InventarioBundle\Entity\TipoInventario $tipoInventario = null)
    {
        $this->tipoInventario = $tipoInventario;

        return $this;
    }

    /**
     * Get tipoInventario
     *
     * @return \DG\InventarioBundle\Entity\TipoInventario 
     */
    public function getTipoInventario()
    {
        return $this->tipoInventario;
    }

    /**
     * Set unidades
     *
     * @param \DG\InventarioBundle\Entity\UnidadMedida $unidades
     * @return Producto
     */
    public function setUnidades(\DG\InventarioBundle\Entity\UnidadMedida $unidades = null)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * Get unidades
     *
     * @return \DG\InventarioBundle\Entity\UnidadMedida 
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set zona
     *
     * @param \DG\InventarioBundle\Entity\Zona $zona
     * @return Producto
     */
    public function setZona(\DG\InventarioBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return \DG\InventarioBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }
    
      /**
     * @ORM\OneToMany(targetEntity="FotoProducto", mappedBy="producto", cascade={"persist", "remove"})
     */
    protected $placas;
    public function __construct()
    {
        //$this->placas = array(new EstudioRadTamPlaca(), new EstudioRadTamPlaca());
        $this->placas = new ArrayCollection();
    }           
    public function getPlacas()
    {
        return $this->placas;
    }
    public function setPlacas(\Doctrine\Common\Collections\Collection $placas)
    {
        $this->placas = $placas;
        foreach ($placas as $placa) {
            $placa->setProducto($this);
        }
    }
}
