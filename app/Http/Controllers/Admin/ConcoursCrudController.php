<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ConcoursRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use function PHPSTORM_META\type;
/**
 * Class ConcoursCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ConcoursCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Concours::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/concours');
        CRUD::setEntityNameStrings('concours', 'concours');
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
        CRUD::column('cadeau_id')->label('Cadeaux');
        CRUD::column('game_id')->label('Jeux');
        $this->crud->addColumn([
            'name'    => 'type',
            'label'   => 'Type',
            'type'    => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                        return 'ml-2 badge-pill badge-success'; 
                },
            ],
        ]);
        // CRUD::column('description');
       // CRUD::column('date_debut')->label('Date de début');
         CRUD::column('date_fin')->label('Date de fin');
         $this->crud->addColumn([
            'name'    => 'active',
            'label'   => 'Actif',
            'type'    => 'boolean',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                            return 'badge badge-dark';
                        }
            ],
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
        CRUD::setValidation(ConcoursRequest::class);

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
        $this->crud->Field('cadeau_id');
        $this->crud->Field('game_id')->label('Jeux');

        
        $this->crud->addField([   // select_from_array
            'name'        => 'type',
            'label'       => "Type",
            'type'        => 'select_from_array',
            'options'     => [
                'Maximum de points' => 'Maximum de points',
                'Cumul de parties' => 'Cumul de parties',
            ],
            'allows_null' => false,
            'default'     => '0',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('description')->type('textarea');
        CRUD::field('description_en')->type('textarea');
        CRUD::field('description_de')->type('textarea');
        CRUD::field('description_es')->type('textarea');
        CRUD::field('description_it')->type('textarea');
        CRUD::field('date_debut')->type('datetime');
        CRUD::field('date_fin')->type('datetime');
        $this->crud->addField([   // radio
            'name'        => 'active', // the name of the db column
            'label'       => 'Activer', // the input label
            'type'        => 'radio',
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                1 => "Oui",
                0 => "Non"
            ],
            // optional
            'default'     => '0',
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
