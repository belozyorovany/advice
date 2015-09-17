<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FAQAdmin extends Admin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('question', 'text', array('label' => 'Вопрос'))
            ->add('answer', 'textarea', array('attr' => array('cols' => '30', 'rows' => '10'), 'label' => 'Ответ'))
            ->add('weight', 'integer', array('label' => 'Вес'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('question')
            ->add('answer');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('question')
            ->add('answer')
            ->add('weight');
    }
}