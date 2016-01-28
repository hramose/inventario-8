<?php

namespace DG\InventarioBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioSistema
 *
 * @ORM\Entity
 * @ORM\Table(name="usuario_sistema")
 */
class UsuarioSistema implements AdvancedUserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="usuarioSistema", cascade={"persist", "remove"})
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
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="rolusuario",
     *     joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")}
     * )
     */
    private $user_roles;

    private $isEnabled;// = false; 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     *
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
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
     *
     * @return Usuario
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Usuario
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
     * Set persona
     *
     * @param \DG\InventarioBundle\Entity\Persona $persona
     *
     * @return Usuario
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
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    

    /**
     * Add rol
     *
     * @param \DG\InventarioBundle\Entity\Rol $userRoles
     *
     * @return UsuarioSistema
     */
    public function addRol(\DG\InventarioBundle\Entity\Rol $userRoles)
    {
        $this->user_roles[] = $userRoles;

        return $this;
    }
    
    /**
     * Remove role
     *
     * @param \DG\InventarioBundle\Entity\Rol $userRoles
     */
    public function removeRole(\DG\InventarioBundle\Entity\Rol $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }

    
    
    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }

    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }
 
    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
    
    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());
 
    }
 
    /**
     * Erases the user credentials.
     */
    public function eraseCredentials() {
 
    }
    
    /*public function __toString() {
        return $this->username ? $this->username : '';
    }*/
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }
    
    public function isAccountNonExpired()
    {
            return true;
    }

    public function isAccountNonLocked()
    {
            return  !$this->isEnabled;
    }

    public function isCredentialsNonExpired()
    {
            return true;
    }

    public function isEnabled()
    {
        if ((int)$this->estado == 1)
        $this->isEnabled = true;
        else
        $this->isEnabled  = false;
        return  $this->isEnabled;
    }
    
     public function __toString() {
    return $this->username ? $this->username : '';
    }
}
