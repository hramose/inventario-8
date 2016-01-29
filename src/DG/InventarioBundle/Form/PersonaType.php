<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('nombres','text',array('label' => 'Nombres','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nombresPersona'
                    )))
            /*->add('segundoNombre','text',array('label' => 'Segundo nombre',
                    'attr'=>array(
                    'class'=>'form-control input-sm'
                    )))*/
            ->add('apellidos','text',array('label' => 'Apellidos','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm apellidosPersona'
                    )))
            ->add('correo','text',array('label' => 'Correo','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm correoPersona'
                    )))
            ->add('celular','text',array('label' => 'Celular','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm celularPersona'
                    )))
            ->add('fijo','text',array('label' => 'Telefono fijo','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm fijoPersona'
                    )))
            ->add('direccion','text',array('label' => 'Direccion','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm direccionPersona'
                    )))
           /* ->add('foto','text',array('label' => 'Foto','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm apellidosPersona'
                    )))  */

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\Persona'
        ));
    }
}
