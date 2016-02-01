<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SucursalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('label' => 'Nombre','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nombreSucursal'
                    )))   
            ->add('alias','text',array('label' => 'Alias','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm aliasSucursal'
                    )))   
            ->add('direccion1','text',array('label' => 'Dirección 1','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm direccion1Sucursal'
                    )))   
            ->add('direccion2','text',array('label' => 'Dirección 2','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm direccion2Sucursal'
                    )))   
            ->add('ciudad','text',array('label' => 'Ciudad','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm ciudadSucursal'
                    )))   
            ->add('provinciaEstado','text',array('label' => 'Estado/Provincia','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm estprovSucursal'
                    )))   
            ->add('postalZip','text',array('label' => 'Codigo postal','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm codpostalSucursal'
                    )))   
            //->add('estado')
            ->add('confTax',null,array('label' => 'Tax','required'=>false,'empty_value'=>'Seleccione tax...',
                    'attr'=>array(
                    'class'=>'form-control input-sm configuracionSucursal'
                    )))   
            //->add('configuracionEmpresa')
                
             ->add('placas','collection',array(
                'type' => new LocalidadContactoType(),
                'label'=>' ',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                ))      
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\Sucursal'
        ));
    }
}
