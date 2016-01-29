<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\Catproducto;
use DG\InventarioBundle\Form\CatproductoType;

/**
 * Catproducto controller.
 *
 * @Route("/admin/catproducto")
 */
class CatproductoController extends Controller
{
    /**
     * Lists all Catproducto entities.
     *
     * @Route("/", name="admin_catproducto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $catproductos = $em->getRepository('DGInventarioBundle:Catproducto')->findAll();

        return $this->render('catproducto/index.html.twig', array(
            'catproductos' => $catproductos,
        ));
    }

    /**
     * Creates a new Catproducto entity.
     *
     * @Route("/new", name="admin_catproducto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $catproducto = new Catproducto();
        $catproducto->setEstado(true);
        $form = $this->createForm('DG\InventarioBundle\Form\CatproductoType', $catproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($catproducto);
            $em->flush();

            return $this->redirectToRoute('admin_catproducto_index', array('id' => $catproducto->getId()));
        }

        return $this->render('catproducto/new.html.twig', array(
            'catproducto' => $catproducto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Catproducto entity.
     *
     * @Route("/{id}", name="admin_catproducto_show")
     * @Method("GET")
     */
    public function showAction(Catproducto $catproducto)
    {
        $deleteForm = $this->createDeleteForm($catproducto);

        return $this->render('catproducto/show.html.twig', array(
            'catproducto' => $catproducto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Catproducto entity.
     *
     * @Route("/{id}/edit", name="admin_catproducto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Catproducto $catproducto)
    {
        $deleteForm = $this->createDeleteForm($catproducto);
        $editForm = $this->createForm('DG\InventarioBundle\Form\CatproductoType', $catproducto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($catproducto);
            $em->flush();

            return $this->redirectToRoute('admin_catproducto_index', array('id' => $catproducto->getId()));
        }

        return $this->render('catproducto/edit.html.twig', array(
            'catproducto' => $catproducto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Catproducto entity.
     *
     * @Route("/{id}", name="admin_catproducto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Catproducto $catproducto)
    {
        $form = $this->createDeleteForm($catproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($catproducto);
            $em->flush();
        }

        return $this->redirectToRoute('admin_catproducto_index');
    }

    /**
     * Creates a form to delete a Catproducto entity.
     *
     * @param Catproducto $catproducto The Catproducto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Catproducto $catproducto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_catproducto_delete', array('id' => $catproducto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * Deletes a Catproducto entity.
     *
     * @Route("/desactivar_catproducto/{id}", name="admin_catproducto_desactivar", options={"expose"=true})
     * @Method("GET")
     */
    public function desactivarAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DGInventarioBundle:Catproducto')->find($id);
        
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
