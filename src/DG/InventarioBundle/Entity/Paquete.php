<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquete
 *
 * @ORM\Table(name="paquete")
 * @ORM\Entity
 */
class Paquete
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
     * @ORM\Column(name="descripcion", type="string", length=400, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="articulos_permitidos", type="integer", nullable=true)
     */
    private $articulosPermitidos;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuarios_permitidos", type="integer", nullable=true)
     */
    private $usuariosPermitidos;

    /**
     * @var string
     *
     * @ORM\Column(name="localidades_permitidas", type="string", length=45, nullable=true)
     */
    private $localidadesPermitidas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="string", length=45, nullable=true)
     */
    private $monto;



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
     * @return Paquete
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Paquete
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
     * Set articulosPermitidos
     *
     * @param integer $articulosPermitidos
     * @return Paquete
     */
    public function setArticulosPermitidos($articulosPermitidos)
    {
        $this->articulosPermitidos = $articulosPermitidos;

        return $this;
    }

    /**
     * Get articulosPermitidos
     *
     * @return integer 
     */
    public function getArticulosPermitidos()
    {
        return $this->articulosPermitidos;
    }

    /**
     * Set usuariosPermitidos
     *
     * @param integer $usuariosPermitidos
     * @return Paquete
     */
    public function setUsuariosPermitidos($usuariosPermitidos)
    {
        $this->usuariosPermitidos = $usuariosPermitidos;

        return $this;
    }

    /**
     * Get usuariosPermitidos
     *
     * @return integer 
     */
    public function getUsuariosPermitidos()
    {
        return $this->usuariosPermitidos;
    }

    /**
     * Set localidadesPermitidas
     *
     * @param string $localidadesPermitidas
     * @return Paquete
     */
    public function setLocalidadesPermitidas($localidadesPermitidas)
    {
        $this->localidadesPermitidas = $localidadesPermitidas;

        return $this;
    }

    /**
     * Get localidadesPermitidas
     *
     * @return string 
     */
    public function getLocalidadesPermitidas()
    {
        return $this->localidadesPermitidas;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Paquete
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Paquete
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
     * Set monto
     *
     * @param string $monto
     * @return Paquete
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }
}
