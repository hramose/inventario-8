<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Barcode;
use DG\InventarioBundle\Form\BarcodeType;

/**
 * Barcode controller.
 *
 * @Route("/admin/barcode")
 */
class BarcodeController extends Controller
{
    /**
     * Lists all Barcode entities.
     *
     * @Route("/", name="admin_barcode_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $barcodes = $em->getRepository('DGInventarioBundle:Barcode')->findAll();

        return $this->render('barcode/index.html.twig', array(
            'barcodes' => $barcodes,
        ));
    }

    /**
     * Creates a new Barcode entity.
     *
     * @Route("/new", name="admin_barcode_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $barcode = new Barcode();
        $form = $this->createForm('DG\InventarioBundle\Form\BarcodeType', $barcode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($barcode);
            $em->flush();

            return $this->redirectToRoute('admin_barcode_show', array('id' => $barcode->getId()));
        }

        return $this->render('barcode/new.html.twig', array(
            'barcode' => $barcode,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Barcode entity.
     *
     * @Route("/{id}", name="admin_barcode_show")
     * @Method("GET")
     */
    public function showAction(Barcode $barcode)
    {
        $deleteForm = $this->createDeleteForm($barcode);

        return $this->render('barcode/show.html.twig', array(
            'barcode' => $barcode,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Barcode entity.
     *
     * @Route("/{id}/edit", name="admin_barcode_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Barcode $barcode)
    {
        $deleteForm = $this->createDeleteForm($barcode);
        $editForm = $this->createForm('DG\InventarioBundle\Form\BarcodeType', $barcode);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($barcode);
            $em->flush();

            return $this->redirectToRoute('admin_barcode_edit', array('id' => $barcode->getId()));
        }

        return $this->render('barcode/edit.html.twig', array(
            'barcode' => $barcode,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Barcode entity.
     *
     * @Route("/{id}", name="admin_barcode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Barcode $barcode)
    {
        $form = $this->createDeleteForm($barcode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($barcode);
            $em->flush();
        }

        return $this->redirectToRoute('admin_barcode_index');
    }

    /**
     * Creates a form to delete a Barcode entity.
     *
     * @param Barcode $barcode The Barcode entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Barcode $barcode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_barcode_delete', array('id' => $barcode->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
