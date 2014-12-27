<?php

namespace Lewik\BoManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/** Class BoFieldConfigurationType */
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
            ->add('system_name')
            ->add('type', 'choice', ['choices' => [
                'smallint' => 'smallint',
                'integer' => 'integer',
                'bigint' => 'bigint',
                'decimal' => 'decimal',
                'float' => 'float',
                'string' => 'string',
                'text' => 'text',
                'boolean' => 'boolean',
                'date' => 'date',
                'datetime' => 'datetime',
                'datetimetz' => 'datetimetz',
                'time' => 'time',
                'many-to-many' => 'many-to-many',
                'one-to-many' => 'one-to-many',
                'many-to-one' => 'many-to-one',
            ]])
            ->add('length')
            ->add('target_entity')
            ->add('mapped_by')
            ->add('inversed_by')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Lewik\BoManagerBundle\Entity\BoFieldConfiguration'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lewik_bomanagerbundle_bofieldconfiguration';
    }
}
