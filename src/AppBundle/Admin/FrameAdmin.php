<?php
/**
 * Created by PhpStorm.
 * User: belozerovany
 * Date: 18.10.15
 * Time: 20:26
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FrameAdmin extends Admin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $frame = $this->getSubject();

        $file1FieldOptions = array('required' => false, 'label' => 'Лого');
        if ($frame && ($webPath = $frame->getWebPathLogo())) {
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $file1FieldOptions['help'] = '<img src="' . $fullPath . '" class="admin-preview" />';
        }

        $file2FieldOptions = array('required' => false, 'label' => 'Баннер');
        if ($frame && ($webPath = $frame->getWebPathHeaderBanner())) {
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $file2FieldOptions['help'] = '<img src="' . $fullPath . '" class="admin-preview" />';
        }

        $formMapper
            ->add('file1', 'file', $file1FieldOptions)
            ->add('file2', 'file', $file2FieldOptions)
            ->add('hello', 'text', array('label' => 'Приветственный текст под баннером'))
            ->add('tagline', 'text', array('label' => 'Слоган'))
            ->add('lines_header', 'text', array('label' => 'Заголовок для направлений деятельности'))
            ->add('lines_description', 'textarea', array('label' => 'Описание для направлений деятельности'))
            ->add('case_area_header', 'text', array('label' => 'Заголовок для областей'))
            ->add('case_area_description', 'textarea', array('label' => 'Описание для областей'))
            ->add('faq_header', 'text', array('label' => 'Заголовок для faq'))
            ->add('faq_description', 'textarea', array('label' => 'Описание для faq'))
            ->add('contacts_header', 'text', array('label' => 'Заголовок для контактов'))
            ->add('contacts_description', 'textarea', array('label' => 'Описание для контактов'))
            ->add('address', 'text', array('label' => 'Адрес'))
            ->add('map', 'textarea', array('attr' => array('cols' => '30', 'rows' => '5'), 'label' => 'Код для отображения карты'))
            ->add('phone', 'text', array('label' => 'Телефон'))
            ->add('email', 'text', array('label' => 'Email'))
            ->add('vk', 'text', array('label' => 'Ссылка на группу в facebook'))
            ->add('fb', 'text', array('label' => 'Ссылка на группу в вконтакте'))
            ->add('active', 'checkbox', array('label' => 'Активность'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('active', null, array('label' => 'Активность'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('tagline', null, array('label' => 'Слоган'))
            ->add('hello', null, array('label' => 'Приветственный текст под баннером'));
    }

    public function prePersist($frame) {
        $this->manageFileUpload($frame);
    }

    public function preUpdate($frame) {
        $this->manageFileUpload($frame);
    }

    private function manageFileUpload($frame) {
        if ($frame->getFile1() || $frame->getFile2()) {
            $frame->refreshUpdated();
        }
    }
}