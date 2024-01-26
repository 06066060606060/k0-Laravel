<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommandesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommandesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommandesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Commandes::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/commandes');
        CRUD::setEntityNameStrings('commandes', 'commandes');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('N°');
        CRUD::field('user_id')
        ->label('Utilisateur')
        ->link('/user/{{user_id}}/edit')
        ->value(function($entry) {
            return $entry->user_id; // Remplacez cela par le nom de votre modèle et votre clé étrangère
        })
        ->text('Voir le profil de l\'utilisateur');
        CRUD::column('created_at')->label('Date');
        CRUD::column('cadeau_id')->label('Contenu');

        $this->crud->addColumn([
            'name'    => 'status',
            'label'   => 'Validé',
            'type'    => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry->status == 'Oui') {
                            return 'ml-4 badge badge-success';
                        } else if ($entry->status == 'Non') {
                            return 'ml-4 badge badge-danger';
                        } else if ($entry->status == 'Annulé') {
                            return 'ml-4 badge badge-danger';
                        } else {
                            return 'ml-4 badge badge-warning';
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
        CRUD::setValidation(CommandesRequest::class);

        CRUD::field('user_id')
        ->label('Utilisateur')
        ->link('/user/{{user_id}}/edit')
        ->value(function($entry) {
            return $entry->user_id; // Remplacez cela par le nom de votre modèle et votre clé étrangère
        })
        ->text('Voir le profil de l\'utilisateur');
            CRUD::field('created_at')->label('Date de commande');
        CRUD::field('cadeau_id')->label('Contenu commande');

        $this->crud->addField([   // radio
            'name'        => 'status', // the name of the db column
            'label'       => 'Validé', // the input label
            'type'        => 'radio',
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                "Envoyé" => "Envoyé",
                "Annulé" => "Annulé",
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
