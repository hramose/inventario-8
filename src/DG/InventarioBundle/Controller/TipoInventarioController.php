<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\TipoInventario;
use DG\InventarioBundle\Form\TipoInventarioType;

/**
 * TipoInventario controller.
 *
 * @Route("/admin/tipoinventario")
 */
class TipoInventarioController extends Controller
{
    /**
     * Lists all TipoInventario entities.
     *
     * @Route("/", name="admin_tipoinventario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoInventarios = $em->getRepository('DGInventarioBundle:TipoInventario')->findAll();

        return $this->render('tipoinventario/index.html.twig', array(
            'tipoInventarios' => $tipoInventarios,
        ));
    }

    /**
     * Creates a new TipoInventario entity.
     *
     * @Route("/new", name="admin_tipoinventario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoInventario = new TipoInventario();
        $form = $this->createForm('DG\InventarioBundle\Form\TipoInventarioType', $tipoInventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoInventario);
            $em->flush();

            return $this->redirectToRoute('admin_tipoinventario_show', array('id' => $tipoinventario->getId()));
        }

        return $this->render('tipoinventario/new.html.twig', array(
            'tipoInventario' => $tipoInventario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoInventario entity.
     *
     * @Route("/{id}", name="admin_tipoinventario_show")
     * @Method("GET")
     */
    public function showAction(TipoInventario $tipoInventario)
    {
        $deleteForm = $this->createDeleteForm($tipoInventario);

        return $this->render('tipoinventario/show.html.twig', array(
            'tipoInventario' => $tipoInventario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoInventario entity.
     *
     * @Route("/{id}/edit", name="admin_tipoinventario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoInventario $tipoInventario)
    {
        $deleteForm = $this->createDeleteForm($tipoInventario);
        $editForm = $this->createForm('DG\InventarioBundle\Form\TipoInventarioType', $tipoInventario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoInventario);
            $em->flush();

            return $this->redirectToRoute('admin_tipoinventario_edit', array('id' => $tipoInventario->getId()));
        }

        return $this->render('tipoinventario/edit.html.twig', array(
            'tipoInventario' => $tipoInventario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoInventario entity.
     *
     * @Route("/{id}", name="admin_tipoinventario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoInventario $tipoInventario)
    {
        $form = $this->createDeleteForm($tipoInventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoInventario);
            $em->flush();
        }

        return $this->redirectToRoute('admin_tipoinventario_index');
    }

    /**
     * Creates a form to delete a TipoInventario entity.
     *
     * @param TipoInventario $tipoInventario The TipoInventario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoInventario $tipoInventario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tipoinventario_delete', array('id' => $tipoInventario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
