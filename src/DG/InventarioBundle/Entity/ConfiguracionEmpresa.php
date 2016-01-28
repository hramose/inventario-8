<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfiguracionEmpresa
 *
 * @ORM\Table(name="configuracion_empresa", indexes={@ORM\Index(name="fk_empresa_usuario_sistema1_idx", columns={"usuario_sistema_id"}), @ORM\Index(name="fk_empresa_time_zone1_idx", columns={"time_zone_id"}), @ORM\Index(name="fk_empresa_pais1_idx", columns={"pais_id"}), @ORM\Index(name="fk_empresa_idioma1_idx", columns={"idioma_id"})})
 * @ORM\Entity
 */
class ConfiguracionEmpresa
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
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

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
     * @ORM\Column(name="provincia_estado", type="string", length=100, nullable=true)
     */
    private $provinciaEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_postal", type="string", length=15, nullable=true)
     */
    private $codPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="nrc", type="string", length=20, nullable=true)
     */
    private $nrc;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=20, nullable=true)
     */
    private $nit;

    /**
     * @var string
     *
     * @ORM\Column(name="giro", type="string", length=100, nullable=true)
     */
    private $giro;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=100, nullable=true)
     */
    private $estado;

    /**
     * @var \Idioma
     *
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idioma_id", referencedColumnName="id")
     * })
     */
    private $idioma;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * @var \TimeZone
     *
     * @ORM\ManyToOne(targetEntity="TimeZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="time_zone_id", referencedColumnName="id")
     * })
     */
    private $timeZone;

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
     * Set nombre
     *
     * @param string $nombre
     * @return ConfiguracionEmpresa
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
     * Set direccion1
     *
     * @param string $direccion1
     * @return ConfiguracionEmpresa
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
     * @return ConfiguracionEmpresa
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
     * @return ConfiguracionEmpresa
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
     * @return ConfiguracionEmpresa
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
     * Set codPostal
     *
     * @param string $codPostal
     * @return ConfiguracionEmpresa
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get codPostal
     *
     * @return string 
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * Set nrc
     *
     * @param string $nrc
     * @return ConfiguracionEmpresa
     */
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;

        return $this;
    }

    /**
     * Get nrc
     *
     * @return string 
     */
    public function getNrc()
    {
        return $this->nrc;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return ConfiguracionEmpresa
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set giro
     *
     * @param string $giro
     * @return ConfiguracionEmpresa
     */
    public function setGiro($giro)
    {
        $this->giro = $giro;

        return $this;
    }

    /**
     * Get giro
     *
     * @return string 
     */
    public function getGiro()
    {
        return $this->giro;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ConfiguracionEmpresa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set idioma
     *
     * @param \DG\InventarioBundle\Entity\Idioma $idioma
     * @return ConfiguracionEmpresa
     */
    public function setIdioma(\DG\InventarioBundle\Entity\Idioma $idioma = null)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return \DG\InventarioBundle\Entity\Idioma 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set pais
     *
     * @param \DG\InventarioBundle\Entity\Pais $pais
     * @return ConfiguracionEmpresa
     */
    public function setPais(\DG\InventarioBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \DG\InventarioBundle\Entity\Pais 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set timeZone
     *
     * @param \DG\InventarioBundle\Entity\TimeZone $timeZone
     * @return ConfiguracionEmpresa
     */
    public function setTimeZone(\DG\InventarioBundle\Entity\TimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return \DG\InventarioBundle\Entity\TimeZone 
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * Set usuarioSistema
     *
     * @param \DG\InventarioBundle\Entity\UsuarioSistema $usuarioSistema
     * @return ConfiguracionEmpresa
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
