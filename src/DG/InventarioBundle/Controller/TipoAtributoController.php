<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\TipoAtributo;
use DG\InventarioBundle\Form\TipoAtributoType;

/**
 * TipoAtributo controller.
 *
 * @Route("/admin/tipoatributo")
 */
class TipoAtributoController extends Controller
{
    /**
     * Lists all TipoAtributo entities.
     *
     * @Route("/", name="admin_tipoatributo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoAtributos = $em->getRepository('DGInventarioBundle:TipoAtributo')->findAll();

        return $this->render('tipoatributo/index.html.twig', array(
            'tipoAtributos' => $tipoAtributos,
        ));
    }

    /**
     * Creates a new TipoAtributo entity.
     *
     * @Route("/new", name="admin_tipoatributo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoAtributo = new TipoAtributo();
        $form = $this->createForm('DG\InventarioBundle\Form\TipoAtributoType', $tipoAtributo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoAtributo);
            $em->flush();

            return $this->redirectToRoute('admin_tipoatributo_show', array('id' => $tipoatributo->getId()));
        }

        return $this->render('tipoatributo/new.html.twig', array(
            'tipoAtributo' => $tipoAtributo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoAtributo entity.
     *
     * @Route("/{id}", name="admin_tipoatributo_show")
     * @Method("GET")
     */
    public function showAction(TipoAtributo $tipoAtributo)
    {
        $deleteForm = $this->createDeleteForm($tipoAtributo);

        return $this->render('tipoatributo/show.html.twig', array(
            'tipoAtributo' => $tipoAtributo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoAtributo entity.
     *
     * @Route("/{id}/edit", name="admin_tipoatributo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoAtributo $tipoAtributo)
    {
        $deleteForm = $this->createDeleteForm($tipoAtributo);
        $editForm = $this->createForm('DG\InventarioBundle\Form\TipoAtributoType', $tipoAtributo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoAtributo);
            $em->flush();

            return $this->redirectToRoute('admin_tipoatributo_edit', array('id' => $tipoAtributo->getId()));
        }

        return $this->render('tipoatributo/edit.html.twig', array(
            'tipoAtributo' => $tipoAtributo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoAtributo entity.
     *
     * @Route("/{id}", name="admin_tipoatributo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoAtributo $tipoAtributo)
    {
        $form = $this->createDeleteForm($tipoAtributo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoAtributo);
            $em->flush();
        }

        return $this->redirectToRoute('admin_tipoatributo_index');
    }

    /**
     * Creates a form to delete a TipoAtributo entity.
     *
     * @param TipoAtributo $tipoAtributo The TipoAtributo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoAtributo $tipoAtributo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tipoatributo_delete', array('id' => $tipoAtributo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
