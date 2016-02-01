<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocalidadContacto
 *
 * @ORM\Table(name="localidad_contacto", indexes={@ORM\Index(name="fk_localidad_contacto_sucursal1_idx", columns={"sucursal_id"})})
 * @ORM\Entity
 */
class LocalidadContacto
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
     * @ORM\Column(name="nombre_manager", type="string", length=100, nullable=true)
     */
    private $nombreManager;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=10, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=10, nullable=true)
     */
    private $fax;

    /**
     * @var \Sucursal
     *
     * @ORM\ManyToOne(targetEntity="Sucursal", inversedBy="idlocalidadcontacto", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     * })
     */
    private $sucursal;



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
     * Set nombreManager
     *
     * @param string $nombreManager
     * @return LocalidadContacto
     */
    public function setNombreManager($nombreManager)
    {
        $this->nombreManager = $nombreManager;

        return $this;
    }

    /**
     * Get nombreManager
     *
     * @return string 
     */
    public function getNombreManager()
    {
        return $this->nombreManager;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return LocalidadContacto
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
     * Set telefono
     *
     * @param string $telefono
     * @return LocalidadContacto
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
     * @return LocalidadContacto
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
     * Set sucursal
     *
     * @param \DG\InventarioBundle\Entity\Sucursal $sucursal
     * @return LocalidadContacto
     */
    public function setSucursal(\DG\InventarioBundle\Entity\Sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \DG\InventarioBundle\Entity\Sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }
}
