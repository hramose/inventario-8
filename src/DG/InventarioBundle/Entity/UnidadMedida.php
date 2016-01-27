<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnidadMedida
 *
 * @ORM\Table(name="unidad_medida", indexes={@ORM\Index(name="fk_unidad_medida_configuracion_empresa1_idx", columns={"configuracion_empresa_id"})})
 * @ORM\Entity
 */
class UnidadMedida
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
     * @return UnidadMedida
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
     * @return UnidadMedida
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
     * Set estado
     *
     * @param boolean $estado
     * @return UnidadMedida
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
     * @return UnidadMedida
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
}
