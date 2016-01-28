<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\ProductoTrasaccion;
use DG\InventarioBundle\Form\ProductoTrasaccionType;

/**
 * ProductoTrasaccion controller.
 *
 * @Route("/admin/productotransaccion")
 */
class ProductoTrasaccionController extends Controller
{
    /**
     * Lists all ProductoTrasaccion entities.
     *
     * @Route("/", name="admin_productotransaccion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productoTrasaccions = $em->getRepository('DGInventarioBundle:ProductoTrasaccion')->findAll();

        return $this->render('productotrasaccion/index.html.twig', array(
            'productoTrasaccions' => $productoTrasaccions,
        ));
    }

    /**
     * Creates a new ProductoTrasaccion entity.
     *
     * @Route("/new", name="admin_productotransaccion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productoTrasaccion = new ProductoTrasaccion();
        $form = $this->createForm('DG\InventarioBundle\Form\ProductoTrasaccionType', $productoTrasaccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoTrasaccion);
            $em->flush();

            return $this->redirectToRoute('admin_productotransaccion_show', array('id' => $productotrasaccion->getId()));
        }

        return $this->render('productotrasaccion/new.html.twig', array(
            'productoTrasaccion' => $productoTrasaccion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductoTrasaccion entity.
     *
     * @Route("/{id}", name="admin_productotransaccion_show")
     * @Method("GET")
     */
    public function showAction(ProductoTrasaccion $productoTrasaccion)
    {
        $deleteForm = $this->createDeleteForm($productoTrasaccion);

        return $this->render('productotrasaccion/show.html.twig', array(
            'productoTrasaccion' => $productoTrasaccion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductoTrasaccion entity.
     *
     * @Route("/{id}/edit", name="admin_productotransaccion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductoTrasaccion $productoTrasaccion)
    {
        $deleteForm = $this->createDeleteForm($productoTrasaccion);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ProductoTrasaccionType', $productoTrasaccion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoTrasaccion);
            $em->flush();

            return $this->redirectToRoute('admin_productotransaccion_edit', array('id' => $productoTrasaccion->getId()));
        }

        return $this->render('productotrasaccion/edit.html.twig', array(
            'productoTrasaccion' => $productoTrasaccion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductoTrasaccion entity.
     *
     * @Route("/{id}", name="admin_productotransaccion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductoTrasaccion $productoTrasaccion)
    {
        $form = $this->createDeleteForm($productoTrasaccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productoTrasaccion);
            $em->flush();
        }

        return $this->redirectToRoute('admin_productotransaccion_index');
    }

    /**
     * Creates a form to delete a ProductoTrasaccion entity.
     *
     * @param ProductoTrasaccion $productoTrasaccion The ProductoTrasaccion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductoTrasaccion $productoTrasaccion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_productotransaccion_delete', array('id' => $productoTrasaccion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
