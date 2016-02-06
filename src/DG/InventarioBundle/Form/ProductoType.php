<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
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
                    'class'=>'form-control input-sm nombreProducto'
                    )))   
//            ->add('fecha','date',array('label' => 'Fecha','required'=>false,
//                    'attr'=>array(
//                    'class'=>'form-control input-sm fechaProducto'
//                    )))   
            ->add('descripcion','textarea',array('label' => 'Descripción','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm descripcionProducto'
                    )))   
            ->add('precioCompra','text',array('label' => 'Precio de compra','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm compraProducto'
                    )))   
            ->add('precioVenta','text',array('label' => 'Precio de venta','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm ventaProducto'
                    )))   
            ->add('sku','text',array('label' => 'SKU','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm skuProducto'
                    )))   
            ->add('serial','text',array('label' => 'Serial','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm serialProducto'
                    )))   
            ->add('inventarioBajo','text',array('label' => 'Inventario bajo','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm invbajoProducto'
                    )))   
//            ->add('totalExistencia')
            ->add('catproducto',null,array('label' => 'Categoria producto','required'=>false,'empty_value'=>'Seleccione categoria...',
                    'attr'=>array(
                    'class'=>'form-control input-sm catproductoProducto'
                    )))   
//            ->add('cuenta',null,array('label' => 'Cuenta','required'=>false,'empty_value'=>'Seleccione cuenta...',
//                    'attr'=>array(
//                    'class'=>'form-control input-sm cuentaProducto'
//                    )))   
//            ->add('empaque')
            ->add('tipoInventario',null,array('label' => 'Tipo de inventario','required'=>false,'empty_value'=>'Seleccione inventario...',
                    'attr'=>array(
                    'class'=>'form-control input-sm tipoinventarioProducto'
                    )))   
            ->add('unidades',null,array('label' => 'Unidades','required'=>false,'empty_value'=>'Seleccione unidades...',
                    'attr'=>array(
                    'class'=>'form-control input-sm unidadesProducto'
                    )))   
            ->add('zona',null,array('label' => 'Zona','required'=>false,'empty_value'=>'Seleccione zona...',
                    'attr'=>array(
                    'class'=>'form-control input-sm zonaProducto'
                    )))   
            ->add('placas','collection',array(
                'type' => new FotoProductoType(),
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
            'data_class' => 'DG\InventarioBundle\Entity\Producto'
        ));
    }
}
