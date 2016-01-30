<?php

namespace DG\InventarioBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\ConfTax;
use DG\InventarioBundle\Form\ConfTaxType;

/**
 * ConfTax controller.
 *
 * @Route("/admin/conftax")
 */
class ConfTaxController extends Controller
{
    /**
     * Lists all ConfTax entities.
     *
     * @Route("/", name="admin_conftax_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confTaxes = $em->getRepository('DGInventarioBundle:ConfTax')->findAll();

        return $this->render('conftax/index.html.twig', array(
            'confTaxes' => $confTaxes,
        ));
    }

    /**
     * Creates a new ConfTax entity.
     *
     * @Route("/new", name="admin_conftax_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confTax = new ConfTax();
        $confTax->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\ConfTaxType', $confTax);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confTax);
            $em->flush();

            return $this->redirectToRoute('admin_conftax_index', array('id' => $confTax->getId()));
        }

        return $this->render('conftax/new.html.twig', array(
            'confTax' => $confTax,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConfTax entity.
     *
     * @Route("/{id}", name="admin_conftax_show")
     * @Method("GET")
     */
    public function showAction(ConfTax $confTax)
    {
        $deleteForm = $this->createDeleteForm($confTax);

        return $this->render('conftax/show.html.twig', array(
            'confTax' => $confTax,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConfTax entity.
     *
     * @Route("/{id}/edit", name="admin_conftax_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfTax $confTax)
    {
        $deleteForm = $this->createDeleteForm($confTax);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ConfTaxType', $confTax);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confTax);
            $em->flush();

            return $this->redirectToRoute('admin_conftax_index', array('id' => $confTax->getId()));
        }

        return $this->render('conftax/edit.html.twig', array(
            'confTax' => $confTax,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ConfTax entity.
     *
     * @Route("/{id}", name="admin_conftax_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfTax $confTax)
    {
        $form = $this->createDeleteForm($confTax);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confTax);
            $em->flush();
        }

        return $this->redirectToRoute('admin_conftax_index');
    }

    /**
     * Creates a form to delete a ConfTax entity.
     *
     * @param ConfTax $confTax The ConfTax entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfTax $confTax)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_conftax_delete', array('id' => $confTax->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
          
   /**
     * Deletes a ConfTax entity.
     *
     * @Route("/desactivar_conftax/{id}", name="admin_conftax_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:ConfTax')->find($id);
        
        if($entity->getEstado()==0){
            $entity->setEstado(1);
            $exito['regs']=1;//registro activado
        }
        else{
            $entity->setEstado(0);
            $exito['regs']=0;//registro desactivado
        }
        
        $em->persist($entity);
        $em->flush();
        
        
        
        return new Response(json_encode($exito));
        
    }  
}
