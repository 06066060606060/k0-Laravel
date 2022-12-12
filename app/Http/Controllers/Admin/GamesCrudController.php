<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GamesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GamesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GamesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Games::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/games');
        CRUD::setEntityNameStrings('jeux', 'jeux');
    }

    function getFieldsData()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'image',
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
        
        $this->crud->setValidation([
            'name' => 'required|min:2',
            ]);
            CRUD::column('name');
            $this->getFieldsData();
            $this->crud->addColumn([
                'name'    => 'category',
                'label'   => 'Catégorie',
                'type'    => 'text',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                            return 'badge badge-success'; 
                    },
                ],
            ]);
            CRUD::column('type');
            CRUD::column('tags');
            CRUD::column('status');
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
            'name' => 'required|min:2|max:255',
        ]);
        CRUD::setValidation(GamesRequest::class);
        CRUD::field('name');
        CRUD::field('image');
        CRUD::addField([ // Photo
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'prefix' => 'storage/',
            'upload'    => true,
            'temporary' => 10,
        ]);
        $this->crud->addField(
            [   // select_from_array
            'name'        => 'type',
            'label'       => "Type de Jeux",
            'type'        => 'select_from_array',
            'options'     => [
                'Booster' => 'Booster',
                'Gratuit' => 'Gratuit',
            ],
            'allows_null' => false,
            'default'     => 'Gratuit',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('description')->type('textarea');
        CRUD::field('link')->label('Lien');
        $this->crud->addField([   // select_from_array
            'name'        => 'category',
            'label'       => "Catégorie",
            'type'        => 'select_from_array',
            'options'     => [
                'Simulation' => 'Simulation',
                'Tir' => 'Tir',
                'Multi-joueurs' => 'Multi-joueurs',
                'Action' => 'Action',
                'Aventure' => 'Aventure',
                'RPG' => 'RPG',
                'Stratégie' => 'Stratégie',
                'Sport' => 'Sport',
                'Autre' => 'Autre',
            ],

            'allows_null' => false,
            'default'     => 'Autre',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        // CRUD::field('tags');
        // CRUD::field('status');
        // CRUD::field('data0');
        // CRUD::field('data1');
        // CRUD::field('data2');
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
