<?php

namespace c0710204\mirrorSite\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mirrorinfoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rootpath')
            ->add('href')
            ->add('intro')
            ->add('name')
            ->add('title')
            ->add('official')
            ->add('workerLink')
            ->add('workerName')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'c0710204\mirrorSite\ManagerBundle\Entity\mirrorinfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'c0710204_mirrorsite_managerbundle_mirrorinfo';
    }
}
