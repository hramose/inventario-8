<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use DG\InventarioBundle\Form\PersonaType;

class UsuarioSistemaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('persona', new PersonaType())    
             ->add('username',null,array('required'=>false,
                    'attr'=>array(
                    'class'=>'form-control nombreUsuario'
                    )))   
            ->add('password','repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'La contraseña no son iguales',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => false,
                    'first_options'  => array('required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm firstPassword'
                    )),
                    'second_options' => array('required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm secondPassword'
                    )),
                ))
                
                
             ->add('user_roles','entity',array('label' => 'Seleccione rol','required'=>false,
                'class'=>'DGInventarioBundle:Rol','property'=>'nombre',
                'multiple'=>true,
                'expanded'=>true,
                    'attr'=>array(
                    'class'=>'roles'
                    )))
                
                
                 ->add('file',null, array('label'=>'Foto de perfil','required'=>false,
                    'attr'=>array('class'=>'fotoUsuario'
                    )))    
                
            //->add('salt')
           // ->add('persona')
            //->add('pais')
            //->add('timeZone')
            //->add('rol')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\UsuarioSistema'
        ));
    }
}
