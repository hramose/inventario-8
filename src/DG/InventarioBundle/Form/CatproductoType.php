<?php

namespace DG\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatproductoType extends AbstractType
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
                    'class'=>'form-control input-sm nombreCatProd'
                    )))   
            ->add('descripcion','textarea',array('label' => 'Descripción','required'=>false,
                    'attr'=>array(
                    'class'=>'form-control input-sm descripcionCatProd'
                    )))   
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DG\InventarioBundle\Entity\Catproducto'
        ));
    }
}
