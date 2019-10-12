<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class ProjectAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper) {
    $formMapper
      ->add(
        'name', 
        TextType::class, 
        ['label' => 'Nombre']
      )
      ->add(
        'description', 
        TextareaType::class, 
        ['label' => 'Descripción']
      );
  }
  protected function configureDatagridFilters(DatagridMapper  $datagridMapper)  {
    $datagridMapper->add(
      'name', 
      null, 
      ['label' => 'Nombre']
    );
  }
  protected function configureListFields(ListMapper $listMapper) {
    $listMapper->addIdentifier(
      'name',  
      null, 
      ['label' => 'Nombre']
    );
  }
}