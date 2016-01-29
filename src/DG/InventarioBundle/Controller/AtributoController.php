<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Atributo;
use DG\InventarioBundle\Form\AtributoType;

/**
 * Atributo controller.
 *
 * @Route("/admin/atributo")
 */
class AtributoController extends Controller
{
    /**
     * Lists all Atributo entities.
     *
     * @Route("/", name="admin_atributo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $atributos = $em->getRepository('DGInventarioBundle:Atributo')->findAll();

        return $this->render('atributo/index.html.twig', array(
            'atributos' => $atributos,
        ));
    }

    /**
     * Creates a new Atributo entity.
     *
     * @Route("/new", name="admin_atributo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $atributo = new Atributo();
        $form = $this->createForm('DG\InventarioBundle\Form\AtributoType', $atributo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($atributo);
            $em->flush();

            return $this->redirectToRoute('admin_atributo_show', array('id' => $atributo->getId()));
        }

        return $this->render('atributo/new.html.twig', array(
            'atributo' => $atributo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Atributo entity.
     *
     * @Route("/{id}", name="admin_atributo_show")
     * @Method("GET")
     */
    public function showAction(Atributo $atributo)
    {
        $deleteForm = $this->createDeleteForm($atributo);

        return $this->render('atributo/show.html.twig', array(
            'atributo' => $atributo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Atributo entity.
     *
     * @Route("/{id}/edit", name="admin_atributo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Atributo $atributo)
    {
        $deleteForm = $this->createDeleteForm($atributo);
        $editForm = $this->createForm('DG\InventarioBundle\Form\AtributoType', $atributo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($atributo);
            $em->flush();

            return $this->redirectToRoute('admin_atributo_edit', array('id' => $atributo->getId()));
        }

        return $this->render('atributo/edit.html.twig', array(
            'atributo' => $atributo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Atributo entity.
     *
     * @Route("/{id}", name="admin_atributo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Atributo $atributo)
    {
        $form = $this->createDeleteForm($atributo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($atributo);
            $em->flush();
        }

        return $this->redirectToRoute('admin_atributo_index');
    }

    /**
     * Creates a form to delete a Atributo entity.
     *
     * @param Atributo $atributo The Atributo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Atributo $atributo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_atributo_delete', array('id' => $atributo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
