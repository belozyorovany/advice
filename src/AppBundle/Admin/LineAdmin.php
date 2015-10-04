<?php
/**
 * Created by PhpStorm.
 * User: belozerovany
 * Date: 19.08.15
 * Time: 17:35
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LineAdmin extends Admin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $line = $this->getSubject();

        $fileFieldOptions = array('required' => false, 'label' => 'Картинка');
        if ($line && ($webPath = $line->getWebPath())) {
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions['help'] = '<img src="' . $fullPath . '" class="admin-preview" />';
        }

        $formMapper
            ->add('title', 'text', array('label' => 'Название'))
            ->add('file', 'file', $fileFieldOptions)
            ->add('preview', 'textarea', array('attr' => array('cols' => '30', 'rows' => '5'), 'label' => 'Превью текста'))
            ->add('description', 'textarea', array('attr' => array('cols' => '30', 'rows' => '10'), 'label' => 'Текст'))
            ->add('weight', 'integer', array('label' => 'Вес'))
            ->add('active', 'checkbox', array('label' => 'Активность'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('title', null, array('label' => 'Название'))
            ->add('active', null, array('label' => 'Активность'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Название'))
            ->add('preview', null, array('label' => 'Превью текста'))
            ->add('active', null, array('label' => 'Активность'))
            ->add('weight', null, array('label' => 'Вес'));
    }

    public function prePersist($line) {
        $this->manageFileUpload($line);
    }

    public function preUpdate($line) {
        $this->manageFileUpload($line);
    }

    private function manageFileUpload($line) {
        if ($line->getFile()) {
            $line->refreshUpdated();
        }
    }
}