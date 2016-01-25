<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Empaque;
use DG\InventarioBundle\Form\EmpaqueType;

/**
 * Empaque controller.
 *
 * @Route("/admin/empaque")
 */
class EmpaqueController extends Controller
{
    /**
     * Lists all Empaque entities.
     *
     * @Route("/", name="admin_empaque_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empaques = $em->getRepository('DGInventarioBundle:Empaque')->findAll();

        return $this->render('empaque/index.html.twig', array(
            'empaques' => $empaques,
        ));
    }

    /**
     * Creates a new Empaque entity.
     *
     * @Route("/new", name="admin_empaque_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $empaque = new Empaque();
        $form = $this->createForm('DG\InventarioBundle\Form\EmpaqueType', $empaque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empaque);
            $em->flush();

            return $this->redirectToRoute('admin_empaque_show', array('id' => $empaque->getId()));
        }

        return $this->render('empaque/new.html.twig', array(
            'empaque' => $empaque,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Empaque entity.
     *
     * @Route("/{id}", name="admin_empaque_show")
     * @Method("GET")
     */
    public function showAction(Empaque $empaque)
    {
        $deleteForm = $this->createDeleteForm($empaque);

        return $this->render('empaque/show.html.twig', array(
            'empaque' => $empaque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empaque entity.
     *
     * @Route("/{id}/edit", name="admin_empaque_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Empaque $empaque)
    {
        $deleteForm = $this->createDeleteForm($empaque);
        $editForm = $this->createForm('DG\InventarioBundle\Form\EmpaqueType', $empaque);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empaque);
            $em->flush();

            return $this->redirectToRoute('admin_empaque_edit', array('id' => $empaque->getId()));
        }

        return $this->render('empaque/edit.html.twig', array(
            'empaque' => $empaque,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Empaque entity.
     *
     * @Route("/{id}", name="admin_empaque_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Empaque $empaque)
    {
        $form = $this->createDeleteForm($empaque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empaque);
            $em->flush();
        }

        return $this->redirectToRoute('admin_empaque_index');
    }

    /**
     * Creates a form to delete a Empaque entity.
     *
     * @param Empaque $empaque The Empaque entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empaque $empaque)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_empaque_delete', array('id' => $empaque->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
