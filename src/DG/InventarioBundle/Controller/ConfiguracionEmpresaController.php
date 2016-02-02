<?php

namespace DG\InventarioBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\ConfiguracionEmpresa;
use DG\InventarioBundle\Form\ConfiguracionEmpresaType;

/**
 * ConfiguracionEmpresa controller.
 *
 * @Route("/admin/configuracionempresa")
 */
class ConfiguracionEmpresaController extends Controller
{
    /**
     * Lists all ConfiguracionEmpresa entities.
     *
     * @Route("/", name="admin_configuracionempresa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $configuracionEmpresas = $em->getRepository('DGInventarioBundle:ConfiguracionEmpresa')->findAll();

        return $this->render('configuracionempresa/index.html.twig', array(
            'configuracionEmpresas' => $configuracionEmpresas,
        ));
    }

    /**
     * Creates a new ConfiguracionEmpresa entity.
     *
     * @Route("/new", name="admin_configuracionempresa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $configuracionEmpresa = new ConfiguracionEmpresa();
        $configuracionEmpresa->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\ConfiguracionEmpresaType', $configuracionEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracionEmpresa);
            $em->flush();

            return $this->redirectToRoute('admin_configuracionempresa_index', array('id' => $configuracionEmpresa->getId()));
        }

        return $this->render('configuracionempresa/new.html.twig', array(
            'configuracionEmpresa' => $configuracionEmpresa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConfiguracionEmpresa entity.
     *
     * @Route("/{id}", name="admin_configuracionempresa_show")
     * @Method("GET")
     */
    public function showAction(ConfiguracionEmpresa $configuracionEmpresa)
    {
        $deleteForm = $this->createDeleteForm($configuracionEmpresa);

        return $this->render('configuracionempresa/show.html.twig', array(
            'configuracionEmpresa' => $configuracionEmpresa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConfiguracionEmpresa entity.
     *
     * @Route("/{id}/edit", name="admin_configuracionempresa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfiguracionEmpresa $configuracionEmpresa)
    {
        $deleteForm = $this->createDeleteForm($configuracionEmpresa);
        $editForm = $this->createForm('DG\InventarioBundle\Form\ConfiguracionEmpresaType', $configuracionEmpresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracionEmpresa);
            $em->flush();

            return $this->redirectToRoute('admin_configuracionempresa_index', array('id' => $configuracionEmpresa->getId()));
        }

        return $this->render('configuracionempresa/edit.html.twig', array(
            'configuracionEmpresa' => $configuracionEmpresa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ConfiguracionEmpresa entity.
     *
     * @Route("/{id}", name="admin_configuracionempresa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfiguracionEmpresa $configuracionEmpresa)
    {
        $form = $this->createDeleteForm($configuracionEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($configuracionEmpresa);
            $em->flush();
        }

        return $this->redirectToRoute('admin_configuracionempresa_index');
    }

    /**
     * Creates a form to delete a ConfiguracionEmpresa entity.
     *
     * @param ConfiguracionEmpresa $configuracionEmpresa The ConfiguracionEmpresa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfiguracionEmpresa $configuracionEmpresa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_configuracionempresa_delete', array('id' => $configuracionEmpresa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * Deletes a ConfiguracionEmpresa entity.
     *
     * @Route("/desactivar_empresa/{id}", name="admin_empresa_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:ConfiguracionEmpresa')->find($id);
        
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
