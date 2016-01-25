<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnidadMedida
 *
 * @ORM\Table(name="unidad_medida", indexes={@ORM\Index(name="fk_unidad_medida_ajuste_empresa1_idx", columns={"ajuste_empresa_id"})})
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
     * @var \AjusteEmpresa
     *
     * @ORM\ManyToOne(targetEntity="AjusteEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ajuste_empresa_id", referencedColumnName="id")
     * })
     */
    private $ajusteEmpresa;



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
     * Set ajusteEmpresa
     *
     * @param \DG\InventarioBundle\Entity\AjusteEmpresa $ajusteEmpresa
     * @return UnidadMedida
     */
    public function setAjusteEmpresa(\DG\InventarioBundle\Entity\AjusteEmpresa $ajusteEmpresa = null)
    {
        $this->ajusteEmpresa = $ajusteEmpresa;

        return $this;
    }

    /**
     * Get ajusteEmpresa
     *
     * @return \DG\InventarioBundle\Entity\AjusteEmpresa 
     */
    public function getAjusteEmpresa()
    {
        return $this->ajusteEmpresa;
    }
}
