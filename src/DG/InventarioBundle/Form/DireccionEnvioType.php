<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DireccionEnvioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('direccion1',null,array('label' => 'Direccion primaria','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('direccion2',null,array('label' => 'Direccion secundaria','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('ciudad',null,array('label' => 'Ciudad','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('provinciaEstado',null,array('label' => 'Provincia/Estado','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('postalZip',null,array('label' => 'Postal/Zip','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            //->add('cuenta')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\DireccionEnvio'
        ));
    }
}
