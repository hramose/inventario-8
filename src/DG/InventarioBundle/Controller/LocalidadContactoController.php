<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\LocalidadContacto;
use DG\InventarioBundle\Form\LocalidadContactoType;

/**
 * LocalidadContacto controller.
 *
 * @Route("/admin/localidadcontacto")
 */
class LocalidadContactoController extends Controller
{
    /**
     * Lists all LocalidadContacto entities.
     *
     * @Route("/", name="admin_localidadcontacto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localidadContactos = $em->getRepository('DGInventarioBundle:LocalidadContacto')->findAll();

        return $this->render('localidadcontacto/index.html.twig', array(
            'localidadContactos' => $localidadContactos,
        ));
    }

    /**
     * Creates a new LocalidadContacto entity.
     *
     * @Route("/new", name="admin_localidadcontacto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $localidadContacto = new LocalidadContacto();
        $form = $this->createForm('DG\InventarioBundle\Form\LocalidadContactoType', $localidadContacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidadContacto);
            $em->flush();

            return $this->redirectToRoute('admin_localidadcontacto_show', array('id' => $localidadcontacto->getId()));
        }

        return $this->render('localidadcontacto/new.html.twig', array(
            'localidadContacto' => $localidadContacto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LocalidadContacto entity.
     *
     * @Route("/{id}", name="admin_localidadcontacto_show")
     * @Method("GET")
     */
    public function showAction(LocalidadContacto $localidadContacto)
    {
        $deleteForm = $this->createDeleteForm($localidadContacto);

        return $this->render('localidadcontacto/show.html.twig', array(
            'localidadContacto' => $localidadContacto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LocalidadContacto entity.
     *
     * @Route("/{id}/edit", name="admin_localidadcontacto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LocalidadContacto $localidadContacto)
    {
        $deleteForm = $this->createDeleteForm($localidadContacto);
        $editForm = $this->createForm('DG\InventarioBundle\Form\LocalidadContactoType', $localidadContacto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidadContacto);
            $em->flush();

            return $this->redirectToRoute('admin_localidadcontacto_edit', array('id' => $localidadContacto->getId()));
        }

        return $this->render('localidadcontacto/edit.html.twig', array(
            'localidadContacto' => $localidadContacto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LocalidadContacto entity.
     *
     * @Route("/{id}", name="admin_localidadcontacto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LocalidadContacto $localidadContacto)
    {
        $form = $this->createDeleteForm($localidadContacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localidadContacto);
            $em->flush();
        }

        return $this->redirectToRoute('admin_localidadcontacto_index');
    }

    /**
     * Creates a form to delete a LocalidadContacto entity.
     *
     * @param LocalidadContacto $localidadContacto The LocalidadContacto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LocalidadContacto $localidadContacto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_localidadcontacto_delete', array('id' => $localidadContacto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
