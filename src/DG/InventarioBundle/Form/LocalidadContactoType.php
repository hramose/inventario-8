<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalidadContactoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreManager',null,array('label' => 'Gerente','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreGerente'
                   )))
            ->add('email',null,array('label' => 'Correo','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm correoLocalidad'
                   )))
            ->add('telefono',null,array('label' => 'Telefono','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm telefonoLocalidad'
                   )))
            ->add('fax',null,array('label' => 'Fax','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm faxLocalidad'
                   )))
//            ->add('localidad',null,array('label' => 'Localidad','required'=>false,
//                   'attr'=>array(
//                   'class'=>'form-control input-sm localidadContacto'
//                   )))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\LocalidadContacto'
        ));
    }
}
