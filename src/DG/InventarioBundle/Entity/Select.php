<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Select
 *
 * @ORM\Table(name="select", indexes={@ORM\Index(name="fk_select_atributo1_idx", columns={"atributo_id"})})
 * @ORM\Entity
 */
class Select
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
     * @var \Atributo
     *
     * @ORM\ManyToOne(targetEntity="Atributo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atributo_id", referencedColumnName="id")
     * })
     */
    private $atributo;



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
     * @return Select
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
     * Set atributo
     *
     * @param \DG\InventarioBundle\Entity\Atributo $atributo
     * @return Select
     */
    public function setAtributo(\DG\InventarioBundle\Entity\Atributo $atributo = null)
    {
        $this->atributo = $atributo;

        return $this;
    }

    /**
     * Get atributo
     *
     * @return \DG\InventarioBundle\Entity\Atributo 
     */
    public function getAtributo()
    {
        return $this->atributo;
    }
}
