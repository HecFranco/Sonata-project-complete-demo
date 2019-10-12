<?php

// src/Admin/CategoryAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
//Fields Type
use Sonata\Form\Type\DatePickerType;
use Sonata\Form\Type\DateTimePickerType;
// Filters
use Sonata\Form\Type\DateRangeType;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;

final class PublicationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('publicationDateStart', DateTimePickerType::class, [
            'dp_side_by_side'       => true,
            'dp_use_current'        => false,
            'dp_use_seconds'        => false,
            'dp_collapse'           => true,
            'dp_calendar_weeks'     => false,
            'dp_view_mode'          => 'days',
            'dp_min_view_mode'      => 'days',
        ])

        // or DatePickerType if you don't need the time
        ->add('publicationDateStart', DatePickerType::class, [
            'dp_use_current' => false,
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('publicationDateStart', DateRangeFilter::class, [
            'field_type' => DateRangeType::class,
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('publicationDateStart');
    }
}