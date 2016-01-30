<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfTaxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreTax','text',array('label' => 'Nombre','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm nombreTax'
                    )))   
            ->add('numeroRegistro','text',array('label' => 'Numero de registro','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm numeroRegistroTax'
                    )))   
            ->add('porcentaje','text',array('label' => 'Porcentaje','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm porcentajeTax'
                    )))   
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\ConfTax'
        ));
    }
}
