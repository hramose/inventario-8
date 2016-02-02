<?php

namespace DG\InventarioBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Zona;
use DG\InventarioBundle\Form\ZonaType;

/**
 * Zona controller.
 *
 * @Route("/admin/zona")
 */
class ZonaController extends Controller
{
    /**
     * Lists all Zona entities.
     *
     * @Route("/", name="admin_zona_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zonas = $em->getRepository('DGInventarioBundle:Zona')->findAll();

        return $this->render('zona/index.html.twig', array(
            'zonas' => $zonas,
        ));
    }

    /**
     * Creates a new Zona entity.
     *
     * @Route("/new", name="admin_zona_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $zona = new Zona();
        $zona->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\ZonaType', $zona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zona);
            $em->flush();

            return $this->redirectToRoute('admin_zona_index', array('id' => $zona->getId()));
        }

        return $this->render('zona/new.html.twig', array(
            'zona' => $zona,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zona entity.
     *
     * @Route("/{id}", name="admin_zona_show")
     * @Method("GET")
     */
    public function showAction(Zona $zona)
    {
        $deleteForm = $this->createDeleteForm($zona);

        return $this->render('zona/show.html.twig', array(
            'zona' => $zona,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zona entity.
     *
     * @Route("/{id}/edit", name="admin_zona_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Zona $zona)
    {
        $deleteForm = $this->createDeleteForm($zona);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ZonaType', $zona);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zona);
            $em->flush();

            return $this->redirectToRoute('admin_zona_index', array('id' => $zona->getId()));
        }

        return $this->render('zona/edit.html.twig', array(
            'zona' => $zona,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Zona entity.
     *
     * @Route("/{id}", name="admin_zona_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Zona $zona)
    {
        $form = $this->createDeleteForm($zona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zona);
            $em->flush();
        }

        return $this->redirectToRoute('admin_zona_index');
    }

    /**
     * Creates a form to delete a Zona entity.
     *
     * @param Zona $zona The Zona entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zona $zona)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_zona_delete', array('id' => $zona->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
       /**
     * Deletes a Zona entity.
     *
     * @Route("/desactivar_zona/{id}", name="admin_zona_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:Zona')->find($id);
        
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
