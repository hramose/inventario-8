<?php

namespace DG\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DG\InventarioBundle\Entity\UsuarioSistema;
use DG\InventarioBundle\Entity\Persona;
use DG\InventarioBundle\Form\UsuarioSistemaType;
use DG\InventarioBundle\Form\PersonaType;

/**
 * UsuarioSistema controller.
 *
 * @Route("/admin/usuario")
 */
class UsuarioSistemaController extends Controller
{
    /**
     * Lists all UsuarioSistema entities.
     *
     * @Route("/", name="admin_usuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarioSistemas = $em->getRepository('DGInventarioBundle:UsuarioSistema')->findAll();

        return $this->render('usuariosistema/index.html.twig', array(
            'usuarioSistemas' => $usuarioSistemas,
        ));
    }

    /**
     * Creates a new UsuarioSistema entity.
     *
     * @Route("/new", name="admin_usuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $usuarioSistema = new UsuarioSistema();
        $form = $this->createForm('DG\InventarioBundle\Form\UsuarioSistemaType', $usuarioSistema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->setSecurePassword($usuarioSistema);
            $em->persist($usuarioSistema);
            $em->flush();

            return $this->redirectToRoute('admin_usuario_index');
        }

        return $this->render('usuariosistema/new.html.twig', array(
            'usuarioSistema' => $usuarioSistema,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UsuarioSistema entity.
     *
     * @Route("/{id}", name="admin_usuario_show")
     * @Method("GET")
     */
    public function showAction(UsuarioSistema $usuarioSistema)
    {
        $deleteForm = $this->createDeleteForm($usuarioSistema);

        return $this->render('usuariosistema/show.html.twig', array(
            'usuarioSistema' => $usuarioSistema,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UsuarioSistema entity.
     *
     * @Route("/{id}/edit", name="admin_usuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UsuarioSistema $usuarioSistema)
    {
        $deleteForm = $this->createDeleteForm($usuarioSistema);
        $editForm = $this->createForm('DG\InventarioBundle\Form\UsuarioSistemaType', $usuarioSistema);
        $current_pass = $usuarioSistema->getPassword();
        $editForm->handleRequest($request);
        
        if($usuarioSistema->getPassword()==""){
            $usuarioSistema->setPassword($current_pass);
        }

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            if ($current_pass != $usuarioSistema->getPassword()) {
                $this->setSecurePassword($usuarioSistema);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuarioSistema);
            $em->flush();

            return $this->redirectToRoute('admin_usuario_edit', array('id' => $usuarioSistema->getId()));
        }

        return $this->render('usuariosistema/edit.html.twig', array(
            'usuarioSistema' => $usuarioSistema,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a UsuarioSistema entity.
     *
     * @Route("/{id}", name="admin_usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UsuarioSistema $usuarioSistema)
    {
        $form = $this->createDeleteForm($usuarioSistema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuarioSistema);
            $em->flush();
        }

        return $this->redirectToRoute('admin_usuario_index');
    }

    /**
     * Creates a form to delete a UsuarioSistema entity.
     *
     * @param UsuarioSistema $usuarioSistema The UsuarioSistema entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UsuarioSistema $usuarioSistema)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_usuario_delete', array('id' => $usuarioSistema->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
    
}
