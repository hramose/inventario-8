<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AtributoPersonalizado
 *
 * @ORM\Table(name="atributo_personalizado", indexes={@ORM\Index(name="fk_atributo_tipo_atributo1_idx", columns={"tipo_atributo_id"}), @ORM\Index(name="fk_atributo_producto1_idx", columns={"producto_id"})})
 * @ORM\Entity
 */
class AtributoPersonalizado
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=50, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_atributo", type="string", length=45, nullable=true)
     */
    private $valorAtributo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

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
     * @var \TipoAtributo
     *
     * @ORM\ManyToOne(targetEntity="TipoAtributo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_atributo_id", referencedColumnName="id")
     * })
     */
    private $tipoAtributo;



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
     * Set name
     *
     * @param string $name
     * @return AtributoPersonalizado
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return AtributoPersonalizado
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
     * Set valorAtributo
     *
     * @param string $valorAtributo
     * @return AtributoPersonalizado
     */
    public function setValorAtributo($valorAtributo)
    {
        $this->valorAtributo = $valorAtributo;

        return $this;
    }

    /**
     * Get valorAtributo
     *
     * @return string 
     */
    public function getValorAtributo()
    {
        return $this->valorAtributo;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return AtributoPersonalizado
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
     * Set producto
     *
     * @param \DG\InventarioBundle\Entity\Producto $producto
     * @return AtributoPersonalizado
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

    /**
     * Set tipoAtributo
     *
     * @param \DG\InventarioBundle\Entity\TipoAtributo $tipoAtributo
     * @return AtributoPersonalizado
     */
    public function setTipoAtributo(\DG\InventarioBundle\Entity\TipoAtributo $tipoAtributo = null)
    {
        $this->tipoAtributo = $tipoAtributo;

        return $this;
    }

    /**
     * Get tipoAtributo
     *
     * @return \DG\InventarioBundle\Entity\TipoAtributo 
     */
    public function getTipoAtributo()
    {
        return $this->tipoAtributo;
    }
}
