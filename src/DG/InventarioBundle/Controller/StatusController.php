<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Status;
use DG\InventarioBundle\Form\StatusType;

/**
 * Status controller.
 *
 * @Route("/admin/status")
 */
class StatusController extends Controller
{
    /**
     * Lists all Status entities.
     *
     * @Route("/", name="admin_status_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statuses = $em->getRepository('DGInventarioBundle:Status')->findAll();

        return $this->render('status/index.html.twig', array(
            'statuses' => $statuses,
        ));
    }

    /**
     * Creates a new Status entity.
     *
     * @Route("/new", name="admin_status_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $status = new Status();
        $form = $this->createForm('DG\InventarioBundle\Form\StatusType', $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($status);
            $em->flush();

            return $this->redirectToRoute('admin_status_show', array('id' => $status->getId()));
        }

        return $this->render('status/new.html.twig', array(
            'status' => $status,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Status entity.
     *
     * @Route("/{id}", name="admin_status_show")
     * @Method("GET")
     */
    public function showAction(Status $status)
    {
        $deleteForm = $this->createDeleteForm($status);

        return $this->render('status/show.html.twig', array(
            'status' => $status,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Status entity.
     *
     * @Route("/{id}/edit", name="admin_status_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Status $status)
    {
        $deleteForm = $this->createDeleteForm($status);
        $editForm = $this->createForm('DG\InventarioBundle\Form\StatusType', $status);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($status);
            $em->flush();

            return $this->redirectToRoute('admin_status_edit', array('id' => $status->getId()));
        }

        return $this->render('status/edit.html.twig', array(
            'status' => $status,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Status entity.
     *
     * @Route("/{id}", name="admin_status_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Status $status)
    {
        $form = $this->createDeleteForm($status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($status);
            $em->flush();
        }

        return $this->redirectToRoute('admin_status_index');
    }

    /**
     * Creates a form to delete a Status entity.
     *
     * @param Status $status The Status entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Status $status)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_status_delete', array('id' => $status->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
