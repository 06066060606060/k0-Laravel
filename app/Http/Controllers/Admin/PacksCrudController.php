<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PacksRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PacksCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PacksCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Packs::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/packs');
        CRUD::setEntityNameStrings('packs', 'packs');
    }
    function getFieldsData()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Miniature',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => 'auto',

        ]);
    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name')->label('Titre');
        $this->getFieldsData();
        CRUD::column('description');
        CRUD::column('description_en');
        CRUD::column('description_de');
        CRUD::column('description_es');
        CRUD::column('description_it');
        CRUD::column('add');
        CRUD::column('add_en');
        CRUD::column('add_de');
        CRUD::column('add_es');
        CRUD::column('add_it');
        CRUD::column('prix');
        $this->crud->addColumn([
            'name'    => 'active',
            'label'   => 'Activé',
            'type'    => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry->active == 'Oui') {
                            return 'ml-4 badge badge-success';
                        } else {
                            return 'ml-4 badge badge-danger';
                        }
                },  ]
            ]);
            $this->crud->addColumn([
                'name'    => 'promo',
                'label'   => 'En promo',
                'type'    => 'text',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                        if ($entry->promo == 'Oui') {
                                return 'ml-4 badge badge-primary';
                            } else {
                                return 'ml-4 badge badge-dark';
                            }
                    },  ]
                ]);
                CRUD::column('prix_promo');
                CRUD::column('gain')->label('Gain');
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

        $this->crud->setValidation([
            'name' => 'required|min:2',
        ]);
        CRUD::setValidation(PacksRequest::class);
        CRUD::field('name')->label('Titre');
        CRUD::addField([ // Photo
            'name'      => 'image',
            'key' => 'image_up',
            'label'     => 'Miniature',
            'type'      => 'upload',
            'prefix' => 'storage/',
            'upload'    => true,
            'temporary' => 10,
        ]);
        CRUD::field('description')->type('textarea');
        CRUD::field('description_en')->type('textarea');
        CRUD::field('description_de')->type('textarea');
        CRUD::field('description_es')->type('textarea');
        CRUD::field('description_it')->type('textarea');
        CRUD::field('add')->type('textarea');
        CRUD::field('add_en')->type('textarea');
        CRUD::field('add_de')->type('textarea');
        CRUD::field('add_es')->type('textarea');
        CRUD::field('add_it')->type('textarea');
        $this->crud->addField([   // radio
            'name'        => 'active', // the name of the db column
            'label'       => 'Activer', // the input label
            'type'        => 'radio',
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                "Oui" => "Oui",
                "Non" => "Non"
            ],
            // optional
            'default'     => '0',
           'inline'      => true, // show the radios all on the same line?
        ],);
        CRUD::field('prix')->type('number')->label('Prix en €');
        $this->crud->addField([   // radio
            'name'        => 'promo', // the name of the db column
            'label'       => 'En promo', // the input label
            'type'        => 'radio',
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                "Oui" => "Oui",
                "Non" => "Non"
            ],
            // optional
            'default'     => '0',
           'inline'      => true, // show the radios all on the same line?
        ],);
        CRUD::field('prix_promo')->type('number')->label('Prix promo en €');

        $this->crud->addField([   // select_from_array
            'name'        => 'type',
            'label'       => "Type",
            'type'        => 'select_from_array',
            'options'     => [
                'Diamants' => 'Diamants',
                'Rubis' => 'Rubis',
                'Coins' => 'Coins',
            ],

            'allows_null' => false,
            'default'     => 'Diamants',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('gain')->type('number');
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
