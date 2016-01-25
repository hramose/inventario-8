<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Pais;
use DG\InventarioBundle\Form\PaisType;

/**
 * Pais controller.
 *
 * @Route("/admin/pais")
 */
class PaisController extends Controller
{
    /**
     * Lists all Pais entities.
     *
     * @Route("/", name="admin_pais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pais = $em->getRepository('DGInventarioBundle:Pais')->findAll();

        return $this->render('pais/index.html.twig', array(
            'pais' => $pais,
        ));
    }

    /**
     * Creates a new Pais entity.
     *
     * @Route("/new", name="admin_pais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pai = new Pais();
        $form = $this->createForm('DG\InventarioBundle\Form\PaisType', $pai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pai);
            $em->flush();

            return $this->redirectToRoute('admin_pais_show', array('id' => $pais->getId()));
        }

        return $this->render('pais/new.html.twig', array(
            'pai' => $pai,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pais entity.
     *
     * @Route("/{id}", name="admin_pais_show")
     * @Method("GET")
     */
    public function showAction(Pais $pai)
    {
        $deleteForm = $this->createDeleteForm($pai);

        return $this->render('pais/show.html.twig', array(
            'pai' => $pai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pais entity.
     *
     * @Route("/{id}/edit", name="admin_pais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pais $pai)
    {
        $deleteForm = $this->createDeleteForm($pai);
        $editForm = $this->createForm('DG\InventarioBundle\Form\PaisType', $pai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pai);
            $em->flush();

            return $this->redirectToRoute('admin_pais_edit', array('id' => $pai->getId()));
        }

        return $this->render('pais/edit.html.twig', array(
            'pai' => $pai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pais entity.
     *
     * @Route("/{id}", name="admin_pais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pais $pai)
    {
        $form = $this->createDeleteForm($pai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pai);
            $em->flush();
        }

        return $this->redirectToRoute('admin_pais_index');
    }

    /**
     * Creates a form to delete a Pais entity.
     *
     * @param Pais $pai The Pais entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pais $pai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_pais_delete', array('id' => $pai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
