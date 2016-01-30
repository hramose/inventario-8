<?php

namespace DG\InventarioBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Sucursal;
use DG\InventarioBundle\Form\SucursalType;

/**
 * Sucursal controller.
 *
 * @Route("/admin/sucursal")
 */
class SucursalController extends Controller
{
    /**
     * Lists all Sucursal entities.
     *
     * @Route("/", name="admin_sucursal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sucursals = $em->getRepository('DGInventarioBundle:Sucursal')->findAll();

        return $this->render('sucursal/index.html.twig', array(
            'sucursals' => $sucursals,
        ));
    }

    /**
     * Creates a new Sucursal entity.
     *
     * @Route("/new", name="admin_sucursal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sucursal = new Sucursal();
        $sucursal->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\SucursalType', $sucursal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sucursal);
            $em->flush();

            return $this->redirectToRoute('admin_sucursal_index', array('id' => $sucursal->getId()));
        }

        return $this->render('sucursal/new.html.twig', array(
            'sucursal' => $sucursal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sucursal entity.
     *
     * @Route("/{id}", name="admin_sucursal_show")
     * @Method("GET")
     */
    public function showAction(Sucursal $sucursal)
    {
        $deleteForm = $this->createDeleteForm($sucursal);

        return $this->render('sucursal/show.html.twig', array(
            'sucursal' => $sucursal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sucursal entity.
     *
     * @Route("/{id}/edit", name="admin_sucursal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sucursal $sucursal)
    {
        $deleteForm = $this->createDeleteForm($sucursal);
        $editForm = $this->createForm('DG\InventarioBundle\Form\SucursalType', $sucursal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sucursal);
            $em->flush();

            return $this->redirectToRoute('admin_sucursal_index', array('id' => $sucursal->getId()));
        }

        return $this->render('sucursal/edit.html.twig', array(
            'sucursal' => $sucursal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sucursal entity.
     *
     * @Route("/{id}", name="admin_sucursal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sucursal $sucursal)
    {
        $form = $this->createDeleteForm($sucursal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sucursal);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sucursal_index');
    }

    /**
     * Creates a form to delete a Sucursal entity.
     *
     * @param Sucursal $sucursal The Sucursal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sucursal $sucursal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sucursal_delete', array('id' => $sucursal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * Deletes a Sucursal entity.
     *
     * @Route("/desactivar_sucursal/{id}", name="admin_sucursal_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:Sucursal')->find($id);
        
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
