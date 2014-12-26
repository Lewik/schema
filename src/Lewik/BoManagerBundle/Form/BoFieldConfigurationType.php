<?php

namespace Lewik\BoManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoFieldConfigurationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('systemName')
            ->add('type')
            ->add('length')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lewik\BoManagerBundle\Entity\BoFieldConfiguration'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lewik_bomanagerbundle_bofieldconfiguration';
    }
}
