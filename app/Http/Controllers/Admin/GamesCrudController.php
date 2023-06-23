<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GamesRequest;
use Illuminate\Support\Facades\Log;  //use
use Backpack\CRUD\app\Library\CrudPanel\CrudColumn;
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
   // use \App\Http\Controllers\Admin\Operations\ProcessOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
   //  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
            'label' => 'Miniature',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => 'auto',
        ]);
    
        // Récupérer les champs du CrudPanel
        $fields = $this->crud->fields;
    
        // Parcourir les champs et modifier les options si le format est .mp4
        foreach ($fields as &$field) {
            if ($field['name'] === 'image') {
                if (isset($field['options']['name']) && strpos($field['options']['name'], '.mp4') !== false) {
                    $field['options']['name'] = str_replace('.mp4', '.gif', $field['options']['name']);
                    // Vous pouvez également modifier d'autres options si nécessaire
                    // $field['options']['prefix'] = str_replace('.mp4', '.gif', $field['options']['prefix']);
                }
            }
        }
    
        // Mettre à jour les champs dans l'objet CrudPanel
        $this->crud->fields = $fields;
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
            CRUD::column('name')->label('Nom');
            $this->getFieldsData();
            CRUD::column('description');
            CRUD::column('description_en');
            CRUD::column('description_de');
            CRUD::column('description_es');
            CRUD::column('description_it');
            $this->crud->addColumn([
                'name'    => 'status',
                'label'   => 'En vedette',
                'type'    => 'boolean',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                                return 'ml-4 badge badge-dark';
                            }
                ],
            ]);
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
            $this->crud->addColumn([
                'name'    => 'type',
                'label'   => 'Type',
                'type'    => 'text',
                'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                            if ($entry->type == 'Gratuit') {
                                return 'badge badge-primary';
                            } else {
                                return 'badge badge-warning';
                            }
                    },
                ],
            ]);
            CRUD::column('port')->label('Socket port');
            // CRUD::column('tags');
            // CRUD::column('status');
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
        CRUD::field('name')->label('Nom');

        CRUD::addField([ // Photo
            'name'      => 'image',
            'key' => 'image_up',
            'label'     => 'Miniature: (H 200px minimum)',
            'type'      => 'upload_multiple',
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
                'Event' => 'Event',
                'Booster' => 'Booster',
                'Gratuit' => 'Gratuit',
                'Solo' => 'Solo',
            ],
            'allows_null' => false,
            'default'     => 'Gratuit',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('description')->type('textarea');
        CRUD::field('description_en')->type('textarea');
        CRUD::field('description_de')->type('textarea');
        CRUD::field('description_es')->type('textarea');
        CRUD::field('description_it')->type('textarea');
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
        CRUD::addField([
            'prefix' => '<i class="las la-map"></i>',
            'name' => 'nbr_gratuit','type' => 'number','label' => 'Nbr gratuit',
            ]);
        CRUD::field('nbr_gratuit')->label('Nbr Gratuit')->type('number');
            CRUD::field('prix')->label('Prix Booster')->type('number');
            $this->crud->addField([   // select_from_array
                'name'        => 'type_prix',
                'label'       => "Type Prix Booster",
                'type'        => 'select_from_array',
                'options'     => [
                    'Diamants' => 'Diamants',
                    'Rubis' => 'Rubis',
                    'Coins' => 'Coins',
                ],
                'allows_null' => false,
                'default'     => 'Autre',
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ]);
    
            $this->crud->addField([   // radio
            'name'        => 'status', // the name of the db column
            'label'       => 'En vedette', // the input label
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
      //  CRUD::field('process')->label('Processus');
        CRUD::field('port')->type('number')->label('Socket port');
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
