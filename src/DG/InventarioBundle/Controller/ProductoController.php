<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Producto;
use DG\InventarioBundle\Entity\FotoProducto;
use DG\InventarioBundle\Form\ProductoType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Producto controller.
 *
 * @Route("/admin/producto")
 */
class ProductoController extends Controller
{
    /**
     * Lists all Producto entities.
     *
     * @Route("/", name="admin_producto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('DGInventarioBundle:Producto')->findAll();
//        var_dump($productos[0]->getPlacas());
        return $this->render('producto/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new Producto entity.
     *
     * @Route("/new", name="admin_producto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $producto->setFecha(new \DateTime('now'));
        $form = $this->createForm('DG\InventarioBundle\Form\ProductoType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();
            
            
              foreach($producto->getPlacas() as $row){
            
                if($row->getFile()!=null){
                    $path = $this->container->getParameter('photo.producto');

                    $fecha = date('Y-m-d His');
                    $extension = $row->getFile()->getClientOriginalExtension();
                    $nombreArchivo = $row->getId()."-"."Imagen"."-".$fecha.".".$extension;

                    $row->setNombre($nombreArchivo);
                    $row->getFile()->move($path,$nombreArchivo);

                    $em->persist($row);
                    $em->flush();

                }  
           } 
           $productot = new \DG\InventarioBundle\Entity\ProductoTrasaccion();
           
           if($producto->getTotalExistencia() != NULL){
               $productot->setCantidad($producto->getTotalExistencia());
           } else {
                $producto->setTotalExistencia(1);              
                $productot->setCantidad(1);
           }
           
//           $productot->setFecha(new \DateTime('now'));
           
           $productot->setProducto($producto);
           $productot->setTipoTransaccion(1);
           $em->persist($productot);
           $em->flush();
           //$producto->getProductoTrasaccion->setFecha(new \DateTime('now')); 
           

            return $this->redirectToRoute('admin_producto_index', array('id' => $producto->getId()));
        }

        return $this->render('producto/new.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Producto entity.
     *
     * @Route("/{id}", name="admin_producto_show")
     * @Method("GET")
     */
    public function showAction(Producto $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);

        return $this->render('producto/show.html.twig', array(
            'producto' => $producto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Producto entity.
     *
     * @Route("/{id}/edit", name="admin_producto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producto $producto)
    {
        
        
        $originalImagenes= new ArrayCollection();
        $path  = $this->getRequest()->server->get('DOCUMENT_ROOT').'/inventario/web/Photos/producto/';
        $path2 = $this->container->getParameter('photo.producto');    
        // Create an ArrayCollection of the current Tag objects in the database
        $i=0;
        
        $originalImagenes = $producto->getPlacas();
 
        //var_dump($producto->getPlacas()); 
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ProductoType', $producto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();
            
            
             foreach ($producto->getPlacas() as $row) {
            
                        
            
               // $galeriaImagenes = new Carrusel();
                if($row->getFile()!=null){
                    $file_path = $path.'/'.$row->getNombre();
                    //echo '*'.$row->getNombre().'*';
                    if(file_exists($file_path) && $row->getNombre()!="") unlink($file_path);
                   var_dump($row->getFile());
                   die();
                    //echo "vc";
                    $fecha = date('Y-m-d His');
                    $extension = $row->getFile()->getClientOriginalExtension();
                    $nombreArchivo = "producto - ".$i." - ".$fecha.".".$extension;

                    //echo $nombreArchivo;
                    //$seguimiento->setFotoAntes($nombreArchivo);


                    $row->getNombre($nombreArchivo);
                    //$imagenConsulta->setConsulta($entity);
                    //array_push($placas, $imagenConsulta);
                    $row->getFile()->move($path2,$nombreArchivo);
                    //$em->merge($seguimiento);
                    $em->persist($row);
                    //$em->flush();
                    $i++;

                }
            
        }
            
        
      
            foreach ($originalImagenes as $row) {
                
                 $file_path = $path2.$row->getNombre();
                if (false === $producto->getPlacas()->contains($row)) {
                    unlink($file_path);
                    // remove the Task from the Tag
                    //$row->getIdcategoria()->removeImagen($row);

                    // if it was a many-to-one relationship, remove the relationship like this
                    //$row->setIdcategoria(null);

                    //$em->persist($row);

                    // if you wanted to delete the Tag entirely, you can also do that
                     $em->remove($row);
                     $em->flush();
                }
            }
            
            
            
            
            $em->flush();


            return $this->redirectToRoute('admin_producto_index', array('id' => $producto->getId()));
        }

        return $this->render('producto/edit.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'placas'=>$producto->getPlacas(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Producto entity.
     *
     * @Route("/{id}", name="admin_producto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producto $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('admin_producto_index');
    }

    /**
     * Creates a form to delete a Producto entity.
     *
     * @param Producto $producto The Producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producto $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_producto_delete', array('id' => $producto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
