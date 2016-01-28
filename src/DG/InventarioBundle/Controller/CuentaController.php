<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Cuenta;
use DG\InventarioBundle\Form\CuentaType;

/**
 * Cuenta controller.
 *
 * @Route("/admin/cuenta")
 */
class CuentaController extends Controller
{
    /**
     * Lists all Cuenta entities.
     *
     * @Route("/", name="admin_cuenta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cuentas = $em->getRepository('DGInventarioBundle:Cuenta')->findAll();

        return $this->render('cuenta/index.html.twig', array(
            'cuentas' => $cuentas,
        ));
    }

    /**
     * Creates a new Cuenta entity.
     *
     * @Route("/new", name="admin_cuenta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cuenta = new Cuenta();
        $form = $this->createForm('DG\InventarioBundle\Form\CuentaType', $cuenta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cuenta);
            $em->flush();

            return $this->redirectToRoute('admin_cuenta_show', array('id' => $cuenta->getId()));
        }

        return $this->render('cuenta/new.html.twig', array(
            'cuentum' => $cuenta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cuenta entity.
     *
     * @Route("/{id}", name="admin_cuenta_show")
     * @Method("GET")
     */
    public function showAction(Cuenta $cuenta)
    {
        $deleteForm = $this->createDeleteForm($cuenta);

        return $this->render('cuenta/show.html.twig', array(
            'cuentum' => $cuenta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cuenta entity.
     *
     * @Route("/{id}/edit", name="admin_cuenta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cuenta $cuenta)
    {
        $deleteForm = $this->createDeleteForm($cuenta);
        $editForm = $this->createForm('DG\InventarioBundle\Form\CuentaType', $cuenta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cuenta);
            $em->flush();

            return $this->redirectToRoute('admin_cuenta_edit', array('id' => $cuenta->getId()));
        }

        return $this->render('cuenta/edit.html.twig', array(
            'cuenta' => $cuenta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cuenta entity.
     *
     * @Route("/{id}", name="admin_cuenta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cuenta $cuenta)
    {
        $form = $this->createDeleteForm($cuenta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cuenta);
            $em->flush();
        }

        return $this->redirectToRoute('admin_cuenta_index');
    }

    /**
     * Creates a form to delete a Cuenta entity.
     *
     * @param Cuenta $cuentum The Cuenta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cuenta $cuenta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_cuenta_delete', array('id' => $cuenta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
