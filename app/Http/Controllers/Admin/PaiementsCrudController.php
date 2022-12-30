<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaiementsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PaiementsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PaiementsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
   // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Paiements::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/paiements');
        CRUD::setEntityNameStrings('paiements', 'paiements');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('Numéro');
        CRUD::column('name')->label('Nom');
        CRUD::column('type')->label('Type');
        CRUD::column('user_id')->label('Utilisateur');
        CRUD::column('pack_id')->label('Pack');
        $this->crud->addColumn([
            'name'    => 'status',
            'label'   => 'Validé',
            'type'    => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry->status == 'Oui') {
                            return 'ml-4 badge badge-success';
                        } else {
                            return 'ml-4 badge badge-danger';
                        }
                },  ]
            ]);
            CRUD::column('created_at')->label('Date');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PaiementsRequest::class);

        
        CRUD::field('name')->label('Nom');
        CRUD::field('type')->label('Type');
        CRUD::field('user_id')->label('Utilisateur');
        CRUD::field('pack_id')->label('Pack');
        $this->crud->addField([   // radio
            'name'        => 'status', // the name of the db column
            'label'       => 'Validé', // the input label
            'type'        => 'radio',
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                "Oui" => "Oui",
                "Non" => "Non"
            ],
            // optional
            'default'     => 'Oui',
           'inline'      => true, // show the radios all on the same line?
        ],);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
