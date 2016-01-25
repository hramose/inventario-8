<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Select;
use DG\InventarioBundle\Form\SelectType;

/**
 * Select controller.
 *
 * @Route("/admin/select")
 */
class SelectController extends Controller
{
    /**
     * Lists all Select entities.
     *
     * @Route("/", name="admin_select_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $selects = $em->getRepository('DGInventarioBundle:Select')->findAll();

        return $this->render('select/index.html.twig', array(
            'selects' => $selects,
        ));
    }

    /**
     * Creates a new Select entity.
     *
     * @Route("/new", name="admin_select_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $select = new Select();
        $form = $this->createForm('DG\InventarioBundle\Form\SelectType', $select);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($select);
            $em->flush();

            return $this->redirectToRoute('admin_select_show', array('id' => $select->getId()));
        }

        return $this->render('select/new.html.twig', array(
            'select' => $select,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Select entity.
     *
     * @Route("/{id}", name="admin_select_show")
     * @Method("GET")
     */
    public function showAction(Select $select)
    {
        $deleteForm = $this->createDeleteForm($select);

        return $this->render('select/show.html.twig', array(
            'select' => $select,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Select entity.
     *
     * @Route("/{id}/edit", name="admin_select_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Select $select)
    {
        $deleteForm = $this->createDeleteForm($select);
        $editForm = $this->createForm('DG\InventarioBundle\Form\SelectType', $select);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($select);
            $em->flush();

            return $this->redirectToRoute('admin_select_edit', array('id' => $select->getId()));
        }

        return $this->render('select/edit.html.twig', array(
            'select' => $select,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Select entity.
     *
     * @Route("/{id}", name="admin_select_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Select $select)
    {
        $form = $this->createDeleteForm($select);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($select);
            $em->flush();
        }

        return $this->redirectToRoute('admin_select_index');
    }

    /**
     * Creates a form to delete a Select entity.
     *
     * @param Select $select The Select entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Select $select)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_select_delete', array('id' => $select->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
