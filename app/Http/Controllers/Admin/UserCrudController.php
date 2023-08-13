<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Mail\AboMail;
use Illuminate\Support\Facades\Mail;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Http\Controllers\Admin\Operations\EmailOperation;
    
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('utilisateur', 'utilisateurs');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('language')->label('Lang');
        CRUD::column('email');
        CRUD::column('trophee1')->label('Diamants');
        CRUD::column('trophee2')->label('Rubis');
        CRUD::column('trophee3')->label('Pièces');
        CRUD::column('nb_achats_mini')->label('Mini');
        CRUD::column('nb_achats_starter')->label('Starter');
        CRUD::column('nb_achats_booster')->label('Booster');
        CRUD::column('nb_achats_maxi')->label('Maxi');
        CRUD::column('nb_achats_tera')->label('Tera');
        CRUD::column('nb_achats_expert')->label('Expert');
        CRUD::column('pelle1')->label('Pelle');
        CRUD::column('support1')->label('Support');
        CRUD::column('jours_gratuits')->label('Jours sans pub');
        $this->crud->enableExportButtons();
       

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
            'email' => 'required',
        ]);
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('password');
        $this->crud->addField([   // select_from_array
            'name'        => 'role',
            'label'       => "role",
            'type'        => 'select_from_array',
            'options'     => [
                'admin' => 'administrateur',
                'user' => 'utilisateur',
            ]]);
                CRUD::field('email')->on('saving', function ($entry) {
                    $mailcontent = array(
                        'email' => env('MAIL_USERNAME'),
                        'message' => "Votre Compte à été crée avec succés",
                    );
                    Mail::to($entry)->queue(new AboMail($mailcontent));
                });
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
        $this->crud->setValidation([
            'name' => 'required|min:2',
            'email' => 'required',
        ]);
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('trophee1')->label('Diamants')->type('number');
        CRUD::field('trophee2')->label('Rubis')->type('number');
        $this->crud->addField([   // select_from_array
            'name'        => 'trophee3',
            'label'       => "Pièces",
            'type'        => 'number',
            'attributes' => ["step" => "0.01"], // allow decimals
            ]);
            CRUD::field('jours_gratuits')->label('Jours gratuits accordés')->type('number');
            CRUD::field('partie_egypt')->label('Partie Egypt')->type('number');
            CRUD::field('parties')->label('Partie GoFRUITS')->type('number');
            CRUD::field('pelle1')->label('Pelle TRESOR')->type('number');
            CRUD::field('support1')->label('Support TRESOR')->type('number');
            CRUD::field('jours_gratuits')->label('Jours sans pub')->type('number');

        $this->crud->addField([   // select_from_array
            'name'        => 'role',
            'label'       => "role",
            'type'        => 'select_from_array',
            'options'     => [
                'admin' => 'administrateur',
                'user' => 'utilisateur',
            ]]);
    }
}
