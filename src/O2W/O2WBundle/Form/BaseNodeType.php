<?php

namespace O2W\O2WBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class BaseNodeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('title')
            ->add('path')
            ->add('body', 'textarea')
            ->add('blocks')
            ->add('files')
            ->add('slug')
            ->add('controller')
            ->add('language')
            ->add('createdAt', 'datetime', array('date_format' => 'dd/MM/yyyy', 'widget'=> 'text'))
            ->add('updatedAt', 'jquery_date')
            ->add('metaDescription')
            ->add('metaKeywords')
            ->add('revision')
            ->add('tags')
            ->add('published')
            ->add('type')
        ;
    }

    public function getName()
    {
        return 'o2w_basebundle_basenodetype';
    }
}
