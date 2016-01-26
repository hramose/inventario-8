<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocialMedia
 *
 * @ORM\Table(name="social_media", indexes={@ORM\Index(name="fk_social_media_usuario_sistema1_idx", columns={"usuario_sistema_id"}), @ORM\Index(name="fk_social_media_empresa1_idx", columns={"empresa_id"})})
 * @ORM\Entity
 */
class SocialMedia
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
     * @ORM\Column(name="twitter", type="string", length=200, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=200, nullable=true)
     */
    private $facebook;

    /**
     * @var \ConfiguracionEmpresa
     *
     * @ORM\ManyToOne(targetEntity="ConfiguracionEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     * })
     */
    private $empresa;

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
     * Set twitter
     *
     * @param string $twitter
     * @return SocialMedia
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return SocialMedia
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set empresa
     *
     * @param \DG\InventarioBundle\Entity\ConfiguracionEmpresa $empresa
     * @return SocialMedia
     */
    public function setEmpresa(\DG\InventarioBundle\Entity\ConfiguracionEmpresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \DG\InventarioBundle\Entity\ConfiguracionEmpresa 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set usuarioSistema
     *
     * @param \DG\InventarioBundle\Entity\UsuarioSistema $usuarioSistema
     * @return SocialMedia
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
