<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\TimeZone;
use DG\InventarioBundle\Form\TimeZoneType;

/**
 * TimeZone controller.
 *
 * @Route("/admin/timezone")
 */
class TimeZoneController extends Controller
{
    /**
     * Lists all TimeZone entities.
     *
     * @Route("/", name="admin_timezone_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $timeZones = $em->getRepository('DGInventarioBundle:TimeZone')->findAll();

        return $this->render('timezone/index.html.twig', array(
            'timeZones' => $timeZones,
        ));
    }

    /**
     * Creates a new TimeZone entity.
     *
     * @Route("/new", name="admin_timezone_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $timeZone = new TimeZone();
        $form = $this->createForm('DG\InventarioBundle\Form\TimeZoneType', $timeZone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($timeZone);
            $em->flush();

            return $this->redirectToRoute('admin_timezone_show', array('id' => $timezone->getId()));
        }

        return $this->render('timezone/new.html.twig', array(
            'timeZone' => $timeZone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TimeZone entity.
     *
     * @Route("/{id}", name="admin_timezone_show")
     * @Method("GET")
     */
    public function showAction(TimeZone $timeZone)
    {
        $deleteForm = $this->createDeleteForm($timeZone);

        return $this->render('timezone/show.html.twig', array(
            'timeZone' => $timeZone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TimeZone entity.
     *
     * @Route("/{id}/edit", name="admin_timezone_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TimeZone $timeZone)
    {
        $deleteForm = $this->createDeleteForm($timeZone);
        $editForm = $this->createForm('DG\InventarioBundle\Form\TimeZoneType', $timeZone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($timeZone);
            $em->flush();

            return $this->redirectToRoute('admin_timezone_edit', array('id' => $timeZone->getId()));
        }

        return $this->render('timezone/edit.html.twig', array(
            'timeZone' => $timeZone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TimeZone entity.
     *
     * @Route("/{id}", name="admin_timezone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TimeZone $timeZone)
    {
        $form = $this->createDeleteForm($timeZone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($timeZone);
            $em->flush();
        }

        return $this->redirectToRoute('admin_timezone_index');
    }

    /**
     * Creates a form to delete a TimeZone entity.
     *
     * @param TimeZone $timeZone The TimeZone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TimeZone $timeZone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_timezone_delete', array('id' => $timeZone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
