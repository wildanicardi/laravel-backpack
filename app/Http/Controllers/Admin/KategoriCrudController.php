<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\KategoriRequest as StoreRequest;
use App\Http\Requests\KategoriRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class KategoriCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class KategoriCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Kategori');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/kategori');
        $this->crud->setEntityNameStrings('kategori', 'kategoris');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        // Columns
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name'
        ]);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name'
        ]);
        // add asterisk for fields that are required in KategoriRequest
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
