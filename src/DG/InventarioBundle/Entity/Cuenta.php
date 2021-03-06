<?php

namespace DG\InventarioBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cuenta
 *
 * @ORM\Table(name="cuenta", indexes={@ORM\Index(name="fk_cuenta_tipo_cuenta1_idx", columns={"tipo_cuenta_id"}), @ORM\Index(name="fk_cuenta_configuracion_empresa1_idx", columns={"configuracion_empresa_id"})})
 * @ORM\Entity
 */
class Cuenta
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
     * @ORM\Column(name="nombre_cuenta", type="string", length=100, nullable=true)
     */
    private $nombreCuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=200, nullable=true)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=25, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=25, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_agregado", type="string", length=45, nullable=true)
     */
    private $valorAgregado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="direccion_igual", type="boolean", nullable=true)
     */
    private $direccionIgual;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

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
     * @var \TipoCuenta
     *
     * @ORM\ManyToOne(targetEntity="TipoCuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_cuenta_id", referencedColumnName="id")
     * })
     */
    private $tipoCuenta;

    /**
     * @ORM\OneToMany(targetEntity="DireccionEnvio", mappedBy="cuenta", cascade={"persist", "remove"})
     * 
     */
    private $direccionEnvio; //Esta sirve para la poder embeber el formulario de Direcion Envio
    
    /**
     * @ORM\OneToMany(targetEntity="DireccionFactura", mappedBy="cuenta", cascade={"persist", "remove"})
     */
    private $direccionFactura; //Esta sirve para la poder embeber el formulario de Direcion Factura


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
     * Set nombreCuenta
     *
     * @param string $nombreCuenta
     * @return Cuenta
     */
    public function setNombreCuenta($nombreCuenta)
    {
        $this->nombreCuenta = $nombreCuenta;

        return $this;
    }

    /**
     * Get nombreCuenta
     *
     * @return string 
     */
    public function getNombreCuenta()
    {
        return $this->nombreCuenta;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Cuenta
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
     * Set web
     *
     * @param string $web
     * @return Cuenta
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Cuenta
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
     * Set fax
     *
     * @param string $fax
     * @return Cuenta
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set valorAgregado
     *
     * @param string $valorAgregado
     * @return Cuenta
     */
    public function setValorAgregado($valorAgregado)
    {
        $this->valorAgregado = $valorAgregado;

        return $this;
    }

    /**
     * Get valorAgregado
     *
     * @return string 
     */
    public function getValorAgregado()
    {
        return $this->valorAgregado;
    }
    
    function getDireccionEnvio() 
    {
        return $this->direccionEnvio;
    }
    
    function setDireccionEnvio($direccionEnvio) 
    {
        $this->direccionEnvio = $direccionEnvio;
    }
    
    function getDireccionFactura() 
    {
        return $this->direccionFactura;
    }
    
    function setDireccionFactura($direccionFactura) 
    {
        $this->direccionFactura = $direccionFactura;
    }

    /**
     * Set direccionIgual
     *
     * @param boolean $direccionIgual
     * @return Cuenta
     */
    public function setDireccionIgual($direccionIgual)
    {
        $this->direccionIgual = $direccionIgual;

        return $this;
    }

    /**
     * Get direccionIgual
     *
     * @return boolean 
     */
    public function getDireccionIgual()
    {
        return $this->direccionIgual;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Cuenta
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
     * Set configuracionEmpresa
     *
     * @param \DG\InventarioBundle\Entity\ConfiguracionEmpresa $configuracionEmpresa
     * @return Cuenta
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
     * Set tipoCuenta
     *
     * @param \DG\InventarioBundle\Entity\TipoCuenta $tipoCuenta
     * @return Cuenta
     */
    public function setTipoCuenta(\DG\InventarioBundle\Entity\TipoCuenta $tipoCuenta = null)
    {
        $this->tipoCuenta = $tipoCuenta;

        return $this;
    }

    /**
     * Get tipoCuenta
     *
     * @return \DG\InventarioBundle\Entity\TipoCuenta 
     */
    public function getTipoCuenta()
    {
        return $this->tipoCuenta;
    }
    
    
     
     /**
     * @ORM\OneToMany(targetEntity="Cuenta", mappedBy="cuenta", cascade={"persist", "remove"})
     */
    protected $coleccion;
    public function __construct()
    {
        //$this->placas = array(new EstudioRadTamPlaca(), new EstudioRadTamPlaca());
        $this->coleccion = new ArrayCollection();
    }           
    public function getColeccion()
    {
        return $this->coleccion;
    }
    public function setColeccion(\Doctrine\Common\Collections\Collection $coleccion)
    {
        $this->coleccion = $coleccion;
        foreach ($coleccion as $coleccion) {
            $coleccion->setTipoColeccion($this);
        }
    }
    
      public function removeColeccion(Cuenta $cuenta)
    {
        $this->cuenta->removeElement($cuenta);
    }
    
    
    
}
