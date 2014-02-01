<?php

namespace c0710204\mirrorSite\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mirroraptType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mirrorid')
            ->add('kind')
            ->add('url')
            ->add('version')
            ->add('softtype')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'c0710204\mirrorSite\ManagerBundle\Entity\mirrorapt'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'c0710204_mirrorsite_managerbundle_mirrorapt';
    }
}
