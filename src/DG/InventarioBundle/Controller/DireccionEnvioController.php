<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\DireccionEnvio;
use DG\InventarioBundle\Form\DireccionEnvioType;

/**
 * DireccionEnvio controller.
 *
 * @Route("/admin/direccionenvio")
 */
class DireccionEnvioController extends Controller
{
    /**
     * Lists all DireccionEnvio entities.
     *
     * @Route("/", name="admin_direccionenvio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $direccionEnvios = $em->getRepository('DGInventarioBundle:DireccionEnvio')->findAll();

        return $this->render('direccionenvio/index.html.twig', array(
            'direccionEnvios' => $direccionEnvios,
        ));
    }

    /**
     * Creates a new DireccionEnvio entity.
     *
     * @Route("/new", name="admin_direccionenvio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $direccionEnvio = new DireccionEnvio();
        $form = $this->createForm('DG\InventarioBundle\Form\DireccionEnvioType', $direccionEnvio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direccionEnvio);
            $em->flush();

            return $this->redirectToRoute('admin_direccionenvio_show', array('id' => $direccionenvio->getId()));
        }

        return $this->render('direccionenvio/new.html.twig', array(
            'direccionEnvio' => $direccionEnvio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DireccionEnvio entity.
     *
     * @Route("/{id}", name="admin_direccionenvio_show")
     * @Method("GET")
     */
    public function showAction(DireccionEnvio $direccionEnvio)
    {
        $deleteForm = $this->createDeleteForm($direccionEnvio);

        return $this->render('direccionenvio/show.html.twig', array(
            'direccionEnvio' => $direccionEnvio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DireccionEnvio entity.
     *
     * @Route("/{id}/edit", name="admin_direccionenvio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DireccionEnvio $direccionEnvio)
    {
        $deleteForm = $this->createDeleteForm($direccionEnvio);
        $editForm = $this->createForm('DG\InventarioBundle\Form\DireccionEnvioType', $direccionEnvio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direccionEnvio);
            $em->flush();

            return $this->redirectToRoute('admin_direccionenvio_edit', array('id' => $direccionEnvio->getId()));
        }

        return $this->render('direccionenvio/edit.html.twig', array(
            'direccionEnvio' => $direccionEnvio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DireccionEnvio entity.
     *
     * @Route("/{id}", name="admin_direccionenvio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DireccionEnvio $direccionEnvio)
    {
        $form = $this->createDeleteForm($direccionEnvio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($direccionEnvio);
            $em->flush();
        }

        return $this->redirectToRoute('admin_direccionenvio_index');
    }

    /**
     * Creates a form to delete a DireccionEnvio entity.
     *
     * @param DireccionEnvio $direccionEnvio The DireccionEnvio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DireccionEnvio $direccionEnvio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_direccionenvio_delete', array('id' => $direccionEnvio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
