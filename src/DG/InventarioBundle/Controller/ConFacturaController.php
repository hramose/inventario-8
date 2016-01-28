<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\ConFactura;
use DG\InventarioBundle\Form\ConFacturaType;

/**
 * ConFactura controller.
 *
 * @Route("/admin/confactura")
 */
class ConFacturaController extends Controller
{
    /**
     * Lists all ConFactura entities.
     *
     * @Route("/", name="admin_confactura_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conFacturas = $em->getRepository('DGInventarioBundle:ConFactura')->findAll();

        return $this->render('confactura/index.html.twig', array(
            'conFacturas' => $conFacturas,
        ));
    }

    /**
     * Creates a new ConFactura entity.
     *
     * @Route("/new", name="admin_confactura_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $conFactura = new ConFactura();
        $form = $this->createForm('DG\InventarioBundle\Form\ConFacturaType', $conFactura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conFactura);
            $em->flush();

            return $this->redirectToRoute('admin_confactura_show', array('id' => $confactura->getId()));
        }

        return $this->render('confactura/new.html.twig', array(
            'conFactura' => $conFactura,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConFactura entity.
     *
     * @Route("/{id}", name="admin_confactura_show")
     * @Method("GET")
     */
    public function showAction(ConFactura $conFactura)
    {
        $deleteForm = $this->createDeleteForm($conFactura);

        return $this->render('confactura/show.html.twig', array(
            'conFactura' => $conFactura,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConFactura entity.
     *
     * @Route("/{id}/edit", name="admin_confactura_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConFactura $conFactura)
    {
        $deleteForm = $this->createDeleteForm($conFactura);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ConFacturaType', $conFactura);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conFactura);
            $em->flush();

            return $this->redirectToRoute('admin_confactura_edit', array('id' => $conFactura->getId()));
        }

        return $this->render('confactura/edit.html.twig', array(
            'conFactura' => $conFactura,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ConFactura entity.
     *
     * @Route("/{id}", name="admin_confactura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConFactura $conFactura)
    {
        $form = $this->createDeleteForm($conFactura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conFactura);
            $em->flush();
        }

        return $this->redirectToRoute('admin_confactura_index');
    }

    /**
     * Creates a form to delete a ConFactura entity.
     *
     * @param ConFactura $conFactura The ConFactura entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConFactura $conFactura)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_confactura_delete', array('id' => $conFactura->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
