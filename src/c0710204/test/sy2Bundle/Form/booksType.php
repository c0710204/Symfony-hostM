<?php

namespace c0710204\test\sy2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class booksType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('site')
            ->add('type')
            ->add('bookid')
            ->add('title')
            ->add('author')
            ->add('count')
            ->add('updatetime')
            ->add('intro')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'c0710204\test\sy2Bundle\Entity\books'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'c0710204_test_sy2bundle_books';
    }
}
