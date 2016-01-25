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
            ->add('nombre')
            ->add('fecha', 'date')
            ->add('descripcion')
            ->add('precioCompra')
            ->add('precioVenta')
            ->add('sku')
            ->add('serial')
            ->add('inventarioBajo')
            ->add('stock')
            ->add('catproducto')
            ->add('cuenta')
            ->add('empaque')
            ->add('tipoInventario')
            ->add('unidades')
            ->add('zona')
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
