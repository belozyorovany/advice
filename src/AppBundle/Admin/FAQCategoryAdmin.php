<?php
/**
 * Created by PhpStorm.
 * User: belozerovany
 * Date: 04.10.15
 * Time: 20:50
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FAQCategoryAdmin extends Admin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('name', 'text', array('label' => 'Наименование'))
            ->add('weight', 'integer', array('label' => 'Вес'))
            ->add('active', 'checkbox', array('label' => 'Активность'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('name', null, array('label' => 'Наименование'))
            ->add('active', null, array('label' => 'Активность'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Наименование'))
            ->add('active', null, array('label' => 'Активность'))
            ->add('weight', null, array('label' => 'Вес'));
    }
}