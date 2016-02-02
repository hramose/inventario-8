<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfiguracionEmpresaType extends AbstractType
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
                    'class'=>'form-control input-sm nombreEmpresa'
                    )))   
            ->add('direccion1','text',array('label' => 'Dirección 1','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm direccion1Empresa'
                    )))   
            ->add('direccion2','text',array('label' => 'Dirección 2','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm direccion2Empresa'
                    )))   
            ->add('ciudad','text',array('label' => 'Ciudad','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm ciudadEmpresa'
                    )))   
            ->add('provinciaEstado','text',array('label' => 'Provincia/Estado','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm provestadoEmpresa'
                    )))   
            ->add('codPostal','text',array('label' => 'Codigo postal','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm codpostalEmpresa'
                    )))   
            ->add('nrc','text',array('label' => 'NRC','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nrcEmpresa'
                    )))   
            ->add('nit','text',array('label' => 'NIT','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nitEmpresa'
                    )))   
            ->add('giro','text',array('label' => 'Giro','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm giroEmpresa'
                    )))   
//            ->add('estado')
//            ->add('idioma')
//            ->add('pais')
//            ->add('timeZone')
//            ->add('usuarioSistema')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\ConfiguracionEmpresa'
        ));
    }
}
