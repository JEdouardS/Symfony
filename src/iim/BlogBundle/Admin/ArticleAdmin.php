<?php
/**
 * Created by PhpStorm.
 * User: phil
 * Date: 18/12/2013
 * Time: 09:53
 */

namespace iim\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
//liste des champs modifiables dans l'edit
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('enabled')
            ->add('name')
            ->add('content')
            ->end()
        ;
    }

//liste des champs qui seront visibles dans la liste des enregistrements
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')

            ->add('content')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

//liste des champs qui pourraient servir à trier les enregistrements dans la liste des enregistrements
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')

            ->add('content')
            ->add('author', null, array('field_options' => array('expanded' => true, 'multiple' => true)))
            ->add('enabled')
        ;
    }
    protected function configureShowField(ShowMapper $show)
    {
        $show
            ->add('name')
            ->add('content')
            ->add('enabled')
        ;
    }
}
