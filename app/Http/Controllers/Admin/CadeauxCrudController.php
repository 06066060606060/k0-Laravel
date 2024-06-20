<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CadeauxRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CadeauxCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CadeauxCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Cadeaux::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cadeaux');
        CRUD::setEntityNameStrings('cadeaux', 'cadeaux');
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
            //CRUD::column('name_en')->label('Titre anglais');
            //CRUD::column('name_de')->label('Titre allemand');
            //CRUD::column('name_es')->label('Titre espagnol');
            //CRUD::column('name_it')->label('Titre italien');
            $this->getFieldsData();
            $this->crud->addColumn([
                'name'    => 'category',
                'label'   => 'Catégorie',
                'type'    => 'text',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                            return 'ml-2 badge-pill badge-success'; 
                    },
                ],
            ]);
            CRUD::column('description');
            CRUD::column('prix');
            CRUD::column('prix_coins');
            $this->crud->addColumn([
                'name'    => 'active',
                'label'   => 'En Stock',
                'type'    => 'text',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                        if ($entry->active == 'Oui') {
                                return 'ml-4 badge badge-primary';
                            } else {
                                return 'ml-4 badge badge-danger';
                            }
                    },  ]
                ]);
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
        CRUD::setValidation(CadeauxRequest::class);
        CRUD::field('name')->label('Titre');
        //CRUD::field('name_en')->label('Titre anglais');
        //CRUD::field('name_de')->label('Titre allemand');
        //CRUD::field('name_es')->label('Titre espagnol');
        //CRUD::field('name_it')->label('Titre italien');
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
        $this->crud->addField([   // select_from_array
            'name'        => 'category',
            'label'       => "Catégorie",
            'type'        => 'select_from_array',
            'options'     => [
                'Amazon' => 'Amazon',
                'Paypal' => 'Paypal',                
                'Codeotop' => 'Codeotop',                
                'Electroménager' => 'Electroménager',
                'High Tech' => 'High Tech',
                'Jeux Vidéo' => 'Jeux Vidéo',
                'Beauté' => 'Beauté',
                'Mode' => 'Mode',
                'Rubis' => 'Rubis',
            ],
            'allows_null' => false,
            'default'     => '0',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([   // radio
            'name'        => 'active', // the name of the db column
            'label'       => 'Afficher', // the input label
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
        CRUD::field('prix')->type('number'); 
        CRUD::field('prix_coins')->type('number')->decimals(2)->attributes(['step' => '0.01']);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
        
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
