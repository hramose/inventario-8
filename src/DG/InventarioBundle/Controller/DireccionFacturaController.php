<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\DireccionFactura;
use DG\InventarioBundle\Form\DireccionFacturaType;

/**
 * DireccionFactura controller.
 *
 * @Route("/admin/direccionfactura")
 */
class DireccionFacturaController extends Controller
{
    /**
     * Lists all DireccionFactura entities.
     *
     * @Route("/", name="admin_direccionfactura_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $direccionFacturas = $em->getRepository('DGInventarioBundle:DireccionFactura')->findAll();

        return $this->render('direccionfactura/index.html.twig', array(
            'direccionFacturas' => $direccionFacturas,
        ));
    }

    /**
     * Creates a new DireccionFactura entity.
     *
     * @Route("/new", name="admin_direccionfactura_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $direccionFactura = new DireccionFactura();
        $form = $this->createForm('DG\InventarioBundle\Form\DireccionFacturaType', $direccionFactura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direccionFactura);
            $em->flush();

            return $this->redirectToRoute('admin_direccionfactura_show', array('id' => $direccionfactura->getId()));
        }

        return $this->render('direccionfactura/new.html.twig', array(
            'direccionFactura' => $direccionFactura,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DireccionFactura entity.
     *
     * @Route("/{id}", name="admin_direccionfactura_show")
     * @Method("GET")
     */
    public function showAction(DireccionFactura $direccionFactura)
    {
        $deleteForm = $this->createDeleteForm($direccionFactura);

        return $this->render('direccionfactura/show.html.twig', array(
            'direccionFactura' => $direccionFactura,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DireccionFactura entity.
     *
     * @Route("/{id}/edit", name="admin_direccionfactura_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DireccionFactura $direccionFactura)
    {
        $deleteForm = $this->createDeleteForm($direccionFactura);
        $editForm = $this->createForm('DG\InventarioBundle\Form\DireccionFacturaType', $direccionFactura);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direccionFactura);
            $em->flush();

            return $this->redirectToRoute('admin_direccionfactura_edit', array('id' => $direccionFactura->getId()));
        }

        return $this->render('direccionfactura/edit.html.twig', array(
            'direccionFactura' => $direccionFactura,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DireccionFactura entity.
     *
     * @Route("/{id}", name="admin_direccionfactura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DireccionFactura $direccionFactura)
    {
        $form = $this->createDeleteForm($direccionFactura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($direccionFactura);
            $em->flush();
        }

        return $this->redirectToRoute('admin_direccionfactura_index');
    }

    /**
     * Creates a form to delete a DireccionFactura entity.
     *
     * @param DireccionFactura $direccionFactura The DireccionFactura entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DireccionFactura $direccionFactura)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_direccionfactura_delete', array('id' => $direccionFactura->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
