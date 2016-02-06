<?php

namespace DG\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FotoProducto
 *
 * @ORM\Table(name="foto_producto", indexes={@ORM\Index(name="fk_fotoproducto_producto1_idx", columns={"producto_id"})})
 * @ORM\Entity
 */
class FotoProducto
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="placas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * })
     */
    private $producto;



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
     * @return FotoProducto
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
     * Set producto
     *
     * @param \DG\InventarioBundle\Entity\Producto $producto
     * @return FotoProducto
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
}
