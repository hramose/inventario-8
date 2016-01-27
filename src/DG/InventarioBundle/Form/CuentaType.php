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
            ->add('nombre_cuenta')
            ->add('email')
            ->add('web')
            ->add('telefono')
            ->add('fax')
            ->add('valor_agregado')
            //->add('tipo_cuenta')
            ->add('direccionIgual')
            ->add('estado')
                ->add('tipo_cuenta','entity',array('label' => 'Seleccione tipo cuenta','required'=>true,
                'class'=>'DGInventarioBundle:TipoCuenta',
                'multiple'=>false,
                'expanded'=>true,
                    'attr'=>array(
                    'class'=>''
                    )))
            ->add('direccionEnvio', new DireccionEnvioType())
            ->add('direccionFactura', new DireccionFacturaType())
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
