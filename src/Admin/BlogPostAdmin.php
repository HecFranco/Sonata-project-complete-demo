<?php

// src/Admin/BlogPostAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\Category;

final class BlogPostAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_app_blogpost';
    protected $baseRoutePattern = 'app/blogpost';
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        $formMapper
          ->tab('Post')
            ->with('Content', ['class' => 'col-md-9'])
              ->add('title', TextType::class)
              ->add('body', TextareaType::class)
              ->add('draft', ChoiceType::class, [
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ],
                'data' => true
              ])
            ->end()
          ->end()
          ->tab('Publish Options')
            ->with('Meta data', ['class' => 'col-md-3'])
              // ...
              /* 
              ->add('CategoryAdmin', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
              ]) 
              */
              ->add('category', ModelType::class, [
                'class' => Category::class,
                'property' => 'name',
              ]) 
            ->end()  
          ->end()             
        ;        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          ->addIdentifier('title')
          ->add('category.name')
          ->add('draft')
          ->add('_action', 'actions', [
            'actions' => [
                'show' => [],
                'edit' => [],
                'delete' => [],
            ]
        ]);
        // ... configure $listMapper
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
      ->add('title')
      ->add('category', null, [], EntityType::class, [
          'class' => Category::class,
          'choice_label' => 'name',
      ])
      ;
    }

    public function postPersist($object) {
      $this->getRequest()->getSession()->getFlashBag()->add("success", "My To-Do custom success message");
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }    
}