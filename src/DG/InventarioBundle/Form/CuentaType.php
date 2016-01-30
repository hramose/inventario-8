<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CuentaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCuenta',null,array('label' => 'Nombre de cuenta','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('email',null,array('label' => 'Correo electronico','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('web',null,array('label' => 'Sitio web','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('telefono',null,array('label' => 'Numero Telefonico','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('fax',null,array('label' => 'Fax','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            ->add('valorAgregado',null,array('label' => 'Valor Agregado','required'=>false,
                   'attr'=>array(
                   'class'=>'form-control input-sm nombreUsuario'
                   )))
            //->add('tipo_cuenta')
            ->add('direccionIgual',null,array('label' => 'Valor Agregado','required'=>false,
                   'attr'=>array(
                   'class'=>'checkbox-inline'
                   )))
             ->add('estado',null,array('label' => 'Estado (activo/inactivo)','required'=>false,
                   'attr'=>array(
                   'class'=>'checkbox-inline', 'checked'=>true
                   )))
//            ->add('tipoCuenta','entity',array('label' => 'Seleccione tipo cuenta','required'=>true,
//            'class'=>'DGInventarioBundle:TipoCuenta',
//            'multiple'=>false,
//            'expanded'=>true,
//                'attr'=>array(
//                'class'=>''
//                )))
//               
                ->add('direccionEnvio','collection',array(
                'type' => new DireccionEnvioType(),
                'label'=>' ',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                ))
                
                
            //->add('direccionEnvio', new DireccionEnvioType())
            //->add('direccionFactura', new DireccionFacturaType())
//            ->add('tipoCuenta','entity', array(
//                'label' => 'Elija una categoria', 'required' => true,'empty_value'=>'Seleccione categoria...',
//                'class'=>'DGInventarioBundle:TipoCuenta',
//                'cascade_validation' => true,
//                ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\Cuenta'
        ));
    }
}
