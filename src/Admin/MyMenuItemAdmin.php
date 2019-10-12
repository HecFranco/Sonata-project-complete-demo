<?php

namespace App\Admin;

use Prodigious\Sonata\MenuBundle\Admin\MenuItemAdmin as BaseAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MyMenuItemAdmin extends BaseAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        
        $formMapper
            ->with('config.label_menu_item')
                ->add('icon', TextType::class, [
                        'label' => 'config.label_icon'
                    ]
                )
            ->end()
        ->end();
    }
}