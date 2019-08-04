<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\NewsRequest as StoreRequest;
use App\Http\Requests\NewsRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\News');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/news');
        $this->crud->setEntityNameStrings('news', 'news');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        $this->crud->addColumn(
            [
                'label'     => 'Nama Kategori', // Table column heading
                'type'      => 'select',
                'name'      => 'kategori_id', // the column that contains the ID of that connected entity;
                'entity'    => 'kategori', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Kategori", // foreign key model

            ]
        );
        $this->crud->addColumn(
            [
                'label'     => 'Title',
                'name'      => 'title',
                'type'      => 'text'
            ]
        );
        $this->crud->addColumn(
            [
                'label'     => 'Tags',
                'name'      => 'tags',
                'type'      => 'text'
            ]
        );
        $this->crud->addColumn(
            [
                'label' => 'Image', // Table column heading
                'name'  => 'image', // The db column name
                'type'  => 'image',
            ]
        );
        $this->crud->addColumn(
            [
                'label' => 'Content', // Table column heading
                'name'  => 'content', // The db column name
                'type'  => 'textarea',
            ]
        );


        $this->crud->addField(
            [
                'name' => 'kategori_id',
                'type' => 'select',
                'label' => 'Nama Kategori',
                'entity'    => 'kategori', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Kategori",
            ]
        );
        $this->crud->addField(
            [
                'name' => 'title',
                'type' => 'text',
                'label' => 'Title',
            ]
        );
        $this->crud->addField(
            [
                'name' => 'tags',
                'type' => 'text',
                'label' => 'Tags',
            ]
        );
        $this->crud->addField(
            [
                'label'        => 'Image',
                'name'         => 'image',
                'type'         => 'browse',
                'tab'          => 'Uploads'
            ]
        );
        $this->crud->addField(
            [
                'name'  => 'content',
                'label' => 'Content',
                'type'  => 'textarea',
            ]
        );
        // add asterisk for fields that are required in NewsRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
