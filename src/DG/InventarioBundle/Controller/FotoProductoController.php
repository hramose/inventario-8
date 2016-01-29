<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\FotoProducto;
use DG\InventarioBundle\Form\FotoProductoType;

/**
 * FotoProducto controller.
 *
 * @Route("/admin/fotoproducto")
 */
class FotoProductoController extends Controller
{
    /**
     * Lists all FotoProducto entities.
     *
     * @Route("/", name="admin_fotoproducto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fotoProductos = $em->getRepository('DGInventarioBundle:FotoProducto')->findAll();

        return $this->render('fotoproducto/index.html.twig', array(
            'fotoProductos' => $fotoProductos,
        ));
    }

    /**
     * Creates a new FotoProducto entity.
     *
     * @Route("/new", name="admin_fotoproducto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fotoProducto = new FotoProducto();
        $form = $this->createForm('DG\InventarioBundle\Form\FotoProductoType', $fotoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fotoProducto);
            $em->flush();

            return $this->redirectToRoute('admin_fotoproducto_show', array('id' => $fotoproducto->getId()));
        }

        return $this->render('fotoproducto/new.html.twig', array(
            'fotoProducto' => $fotoProducto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FotoProducto entity.
     *
     * @Route("/{id}", name="admin_fotoproducto_show")
     * @Method("GET")
     */
    public function showAction(FotoProducto $fotoProducto)
    {
        $deleteForm = $this->createDeleteForm($fotoProducto);

        return $this->render('fotoproducto/show.html.twig', array(
            'fotoProducto' => $fotoProducto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FotoProducto entity.
     *
     * @Route("/{id}/edit", name="admin_fotoproducto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FotoProducto $fotoProducto)
    {
        $deleteForm = $this->createDeleteForm($fotoProducto);
        $editForm = $this->createForm('DG\InventarioBundle\Form\FotoProductoType', $fotoProducto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fotoProducto);
            $em->flush();

            return $this->redirectToRoute('admin_fotoproducto_edit', array('id' => $fotoProducto->getId()));
        }

        return $this->render('fotoproducto/edit.html.twig', array(
            'fotoProducto' => $fotoProducto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FotoProducto entity.
     *
     * @Route("/{id}", name="admin_fotoproducto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FotoProducto $fotoProducto)
    {
        $form = $this->createDeleteForm($fotoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fotoProducto);
            $em->flush();
        }

        return $this->redirectToRoute('admin_fotoproducto_index');
    }

    /**
     * Creates a form to delete a FotoProducto entity.
     *
     * @param FotoProducto $fotoProducto The FotoProducto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FotoProducto $fotoProducto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_fotoproducto_delete', array('id' => $fotoProducto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
