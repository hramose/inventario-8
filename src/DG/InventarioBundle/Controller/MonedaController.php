<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Moneda;
use DG\InventarioBundle\Form\MonedaType;

/**
 * Moneda controller.
 *
 * @Route("/admin/moneda")
 */
class MonedaController extends Controller
{
    /**
     * Lists all Moneda entities.
     *
     * @Route("/", name="admin_moneda_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $monedas = $em->getRepository('DGInventarioBundle:Moneda')->findAll();

        return $this->render('moneda/index.html.twig', array(
            'monedas' => $monedas,
        ));
    }

    /**
     * Creates a new Moneda entity.
     *
     * @Route("/new", name="admin_moneda_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $moneda = new Moneda();
        $form = $this->createForm('DG\InventarioBundle\Form\MonedaType', $moneda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moneda);
            $em->flush();

            return $this->redirectToRoute('admin_moneda_show', array('id' => $moneda->getId()));
        }

        return $this->render('moneda/new.html.twig', array(
            'moneda' => $moneda,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Moneda entity.
     *
     * @Route("/{id}", name="admin_moneda_show")
     * @Method("GET")
     */
    public function showAction(Moneda $moneda)
    {
        $deleteForm = $this->createDeleteForm($moneda);

        return $this->render('moneda/show.html.twig', array(
            'moneda' => $moneda,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Moneda entity.
     *
     * @Route("/{id}/edit", name="admin_moneda_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Moneda $moneda)
    {
        $deleteForm = $this->createDeleteForm($moneda);
        $editForm = $this->createForm('DG\InventarioBundle\Form\MonedaType', $moneda);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moneda);
            $em->flush();

            return $this->redirectToRoute('admin_moneda_edit', array('id' => $moneda->getId()));
        }

        return $this->render('moneda/edit.html.twig', array(
            'moneda' => $moneda,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Moneda entity.
     *
     * @Route("/{id}", name="admin_moneda_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Moneda $moneda)
    {
        $form = $this->createDeleteForm($moneda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moneda);
            $em->flush();
        }

        return $this->redirectToRoute('admin_moneda_index');
    }

    /**
     * Creates a form to delete a Moneda entity.
     *
     * @param Moneda $moneda The Moneda entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Moneda $moneda)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_moneda_delete', array('id' => $moneda->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
