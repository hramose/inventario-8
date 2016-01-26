<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioSistema
 *
 * @ORM\Table(name="usuario_sistema", indexes={@ORM\Index(name="fk_usuario_persona_idx", columns={"persona_id"}), @ORM\Index(name="fk_usuario_sistema_time_zone1_idx", columns={"time_zone_id"}), @ORM\Index(name="fk_usuario_sistema_pais1_idx", columns={"pais_id"})})
 * @ORM\Entity
 */
class UsuarioSistema
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
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     * })
     */
    private $persona;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rol", mappedBy="usuario")
     */
    private $rol;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rol = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set usuario
     *
     * @param string $usuario
     * @return UsuarioSistema
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return UsuarioSistema
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return UsuarioSistema
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set persona
     *
     * @param \DG\InventarioBundle\Entity\Persona $persona
     * @return UsuarioSistema
     */
    public function setPersona(\DG\InventarioBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \DG\InventarioBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set pais
     *
     * @param \DG\InventarioBundle\Entity\Pais $pais
     * @return UsuarioSistema
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
     * @return UsuarioSistema
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
     * Add rol
     *
     * @param \DG\InventarioBundle\Entity\Rol $rol
     * @return UsuarioSistema
     */
    public function addRol(\DG\InventarioBundle\Entity\Rol $rol)
    {
        $this->rol[] = $rol;

        return $this;
    }

    /**
     * Remove rol
     *
     * @param \DG\InventarioBundle\Entity\Rol $rol
     */
    public function removeRol(\DG\InventarioBundle\Entity\Rol $rol)
    {
        $this->rol->removeElement($rol);
    }

    /**
     * Get rol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRol()
    {
        return $this->rol;
    }
}
