<?php

//src/SfTuts/JobeetBundle/Admin/JobAdmin.php

namespace O2W\O2WBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class BaseNodeAdmin extends Admin
{

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('name', null, array('required' => false))
            //            ->add('blocks', 'sonata_type_model', array(), array('edit' => 'list'))
            ->add('title')
            ->add('body', 'ckeditor')
            //->add("body")
            ->add('path')
            ->add('slug')
            ->add('controller')
            ->add('language')
            ->end()
            ->with('Tags')
            //            ->add('tags', 'sonata_type_model', array('expanded' => true))
            ->end()
            ->with('Options', array('collapsed' => true))
            ->add('published')
            //            ->add('createdAt', 'jquery_date')
            //            ->add('updatedAt', null, array('required' => false))
            ->end()
            ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('title')
            ->add('published')
            ->add('tags')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('title')
            ;
    }



}