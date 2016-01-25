<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Localidad;
use DG\InventarioBundle\Form\LocalidadType;

/**
 * Localidad controller.
 *
 * @Route("/admin/localidad")
 */
class LocalidadController extends Controller
{
    /**
     * Lists all Localidad entities.
     *
     * @Route("/", name="admin_localidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localidads = $em->getRepository('DGInventarioBundle:Localidad')->findAll();

        return $this->render('localidad/index.html.twig', array(
            'localidads' => $localidads,
        ));
    }

    /**
     * Creates a new Localidad entity.
     *
     * @Route("/new", name="admin_localidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $localidad = new Localidad();
        $form = $this->createForm('DG\InventarioBundle\Form\LocalidadType', $localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidad);
            $em->flush();

            return $this->redirectToRoute('admin_localidad_show', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/new.html.twig', array(
            'localidad' => $localidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Localidad entity.
     *
     * @Route("/{id}", name="admin_localidad_show")
     * @Method("GET")
     */
    public function showAction(Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);

        return $this->render('localidad/show.html.twig', array(
            'localidad' => $localidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Localidad entity.
     *
     * @Route("/{id}/edit", name="admin_localidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);
        $editForm = $this->createForm('DG\InventarioBundle\Form\LocalidadType', $localidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidad);
            $em->flush();

            return $this->redirectToRoute('admin_localidad_edit', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/edit.html.twig', array(
            'localidad' => $localidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Localidad entity.
     *
     * @Route("/{id}", name="admin_localidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Localidad $localidad)
    {
        $form = $this->createDeleteForm($localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localidad);
            $em->flush();
        }

        return $this->redirectToRoute('admin_localidad_index');
    }

    /**
     * Creates a form to delete a Localidad entity.
     *
     * @param Localidad $localidad The Localidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localidad $localidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_localidad_delete', array('id' => $localidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
