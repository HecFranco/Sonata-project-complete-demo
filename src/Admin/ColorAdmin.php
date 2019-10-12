<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\CoreBundle\Form\Type\ColorType;

final class ColorAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper) {
    $formMapper
      ->add(
        'name', 
        TextType::class, 
        ['label' => 'Nombre']
      )
      ->add(
        'color', ColorType::class);
  }
  protected function configureDatagridFilters(DatagridMapper  $datagridMapper)  {
    $datagridMapper->add(
      'name', 
      null, 
      ['label' => 'Nombre']
    )
    ->add('color');
  }
  protected function configureListFields(ListMapper $listMapper) {
    $listMapper->addIdentifier(
      'name',  
      null, 
      ['label' => 'Nombre']
    )
    ->addIdentifier('color');
  }
}