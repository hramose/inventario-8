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
            ->add('nombreCuenta')
            ->add('email')
            ->add('web')
            ->add('telefono')
            ->add('fax')
            ->add('valorAgregado')
            ->add('tipoCuenta')
            ->add('empresa')
            ->add('tipoCuenta2')
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
