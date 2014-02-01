<?php

namespace c0710204\test\sy2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class hostType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('sites')
            ->add('renewtime')
            ->add('information')
            ->add('hostSite')
            ->add('hostIp')
            ->add('hostUser')
            ->add('hostPass')
            ->add('ftpSite')
            ->add('ftpUser')
            ->add('ftpPass')
            ->add('size')
            ->add('bandwidth')
            ->add('cputime')
            ->add('ram')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'c0710204\test\sy2Bundle\Entity\host'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'c0710204_test_sy2bundle_host';
    }
}
