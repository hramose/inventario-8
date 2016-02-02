<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sucursal
 *
 * @ORM\Table(name="sucursal", indexes={@ORM\Index(name="fk_localidad_conf_tax1_idx", columns={"conf_tax_id"}), @ORM\Index(name="fk_sucursal_configuracion_empresa1_idx", columns={"configuracion_empresa_id"})})
 * @ORM\Entity
 */
class Sucursal
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
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;
    
    
     /**
     * @var integer
     *
     *
     * @ORM\OneToOne(targetEntity="LocalidadContacto", mappedBy="sucursal", cascade={"persist", "remove"})
     */
    private $idlocalidadcontacto;

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
     * @var \ConfiguracionEmpresa
     *
     * @ORM\ManyToOne(targetEntity="ConfiguracionEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configuracion_empresa_id", referencedColumnName="id")
     * })
     */
    private $configuracionEmpresa;



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
     * @return Sucursal
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
     * @return Sucursal
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
     * @return Sucursal
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
     * @return Sucursal
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
     * @return Sucursal
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
     * @return Sucursal
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
     * @return Sucursal
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
     * Set estado
     *
     * @param boolean $estado
     * @return Sucursal
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
     * Set idlocalidadcontacto
     *
     * @param \DG\InventarioBundle\Entity\LocalidadContacto $idlocalidadcontacto
     *
     * @return Sucursal
     */
    public function setIdlocalidadcontacto(\DG\InventarioBundle\Entity\LocalidadContacto $idlocalidadcontacto)
    {
        $this->idlocalidadcontacto = $idlocalidadcontacto;

        return $this;
    }

    /**
     * Get idlocalidadcontacto
     *
     * @return \DG\InventarioBundle\Entity\LocalidadContacto
     */
    public function getIdlocalidadcontacto()
    {
        return $this->idlocalidadcontacto;
    }


    /**
     * Set confTax
     *
     * @param \DG\InventarioBundle\Entity\ConfTax $confTax
     * @return Sucursal
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
     * Set configuracionEmpresa
     *
     * @param \DG\InventarioBundle\Entity\ConfiguracionEmpresa $configuracionEmpresa
     * @return Sucursal
     */
    public function setConfiguracionEmpresa(\DG\InventarioBundle\Entity\ConfiguracionEmpresa $configuracionEmpresa = null)
    {
        $this->configuracionEmpresa = $configuracionEmpresa;

        return $this;
    }

    /**
     * Get configuracionEmpresa
     *
     * @return \DG\InventarioBundle\Entity\ConfiguracionEmpresa 
     */
    public function getConfiguracionEmpresa()
    {
        return $this->configuracionEmpresa;
    }
    
      /**
     * @ORM\OneToMany(targetEntity="LocalidadContacto", mappedBy="sucursal", cascade={"persist", "remove"})
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
            $placa->setSucursal($this);
        }
    }
    
    public function __toString() {
    return $this->nombre ? $this->nombre : '';
    }
}
