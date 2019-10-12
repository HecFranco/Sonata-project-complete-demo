<?php
namespace App\Admin;

use Prodigious\Sonata\MenuBundle\Admin\MenuAdmin as BaseAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class MyMenuAdmin extends BaseAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
    }
}