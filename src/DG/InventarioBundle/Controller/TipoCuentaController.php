<?php

namespace DG\InventarioBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\TipoCuenta;
use DG\InventarioBundle\Form\TipoCuentaType;

/**
 * TipoCuenta controller.
 *
 * @Route("/admin/tipocuenta")
 */
class TipoCuentaController extends Controller
{
    /**
     * Lists all TipoCuenta entities.
     *
     * @Route("/", name="admin_tipocuenta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoCuentas = $em->getRepository('DGInventarioBundle:TipoCuenta')->findAll();

        return $this->render('tipocuenta/index.html.twig', array(
            'tipoCuentas' => $tipoCuentas,
        ));
    }

    /**
     * Creates a new TipoCuenta entity.
     *
     * @Route("/new", name="admin_tipocuenta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoCuentum = new TipoCuenta();
        $tipoCuentum->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\TipoCuentaType', $tipoCuentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoCuentum);
            $em->flush();

            return $this->redirectToRoute('admin_tipocuenta_index', array('id' => $tipoCuentum->getId()));
        }

        return $this->render('tipocuenta/new.html.twig', array(
            'tipoCuentum' => $tipoCuentum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoCuenta entity.
     *
     * @Route("/{id}", name="admin_tipocuenta_show")
     * @Method("GET")
     */
    public function showAction(TipoCuenta $tipoCuentum)
    {
        $deleteForm = $this->createDeleteForm($tipoCuentum);

        return $this->render('tipocuenta/show.html.twig', array(
            'tipoCuentum' => $tipoCuentum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoCuenta entity.
     *
     * @Route("/{id}/edit", name="admin_tipocuenta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoCuenta $tipoCuentum)
    {
        $deleteForm = $this->createDeleteForm($tipoCuentum);
        $editForm = $this->createForm('DG\InventarioBundle\Form\TipoCuentaType', $tipoCuentum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoCuentum);
            $em->flush();

            return $this->redirectToRoute('admin_tipocuenta_index', array('id' => $tipoCuentum->getId()));
        }

        return $this->render('tipocuenta/edit.html.twig', array(
            'tipoCuentum' => $tipoCuentum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoCuenta entity.
     *
     * @Route("/{id}", name="admin_tipocuenta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoCuenta $tipoCuentum)
    {
        $form = $this->createDeleteForm($tipoCuentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoCuentum);
            $em->flush();
        }

        return $this->redirectToRoute('admin_tipocuenta_index');
    }

    /**
     * Creates a form to delete a TipoCuenta entity.
     *
     * @param TipoCuenta $tipoCuentum The TipoCuenta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoCuenta $tipoCuentum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tipocuenta_delete', array('id' => $tipoCuentum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
       
   /**
     * Deletes a TipoCuenta entity.
     *
     * @Route("/desactivar_tipocuenta/{id}", name="admin_tipocuenta_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:TipoCuenta')->find($id);
        
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
