<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZonaType extends AbstractType
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
                    'class'=>'form-control input-sm nombreZona'
                    )))   
            ->add('alias','text',array('label' => 'Alias','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm aliasZona'
                    )))   
            ->add('descripcion','textarea',array('label' => 'Descripción','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm descripcionZona'
                    )))   
//            ->add('localidad')
             ->add('sucursal',null,array('label' => 'Susursal','required'=>false,'empty_value'=>'Seleccione sucursal...',
                    'attr'=>array(
                    'class'=>'form-control input-sm idSucursal'
                    )))       
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\Zona'
        ));
    }
}
