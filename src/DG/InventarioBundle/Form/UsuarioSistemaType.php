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
             ->add('username',null,array('label' => 'Usuario','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nombreUsuario'
                    )))   
            ->add('password','repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'La contraseña no son iguales',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => false,
                    'first_options'  => array('label' => 'Contraseña','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm firstPassword'
                    )),
                    'second_options' => array('label' => 'Confirmar contraseña','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm secondPassword'
                    )),
                ))
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
