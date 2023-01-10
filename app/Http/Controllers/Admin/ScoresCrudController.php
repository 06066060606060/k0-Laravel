<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScoresRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use function PHPSTORM_META\type;

/**
 * Class ScoresCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScoresCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Scores::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/scores');
        CRUD::setEntityNameStrings('scores', 'scores');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('game_id')->label('Nom du jeu');
        CRUD::column('user_id')->label('Joueur');
        CRUD::column('score')->label('Score');
        CRUD::column('data')->label('Bonus1');
        CRUD::column('data2')->label('Bonus2');
        CRUD::column('data3')->label('Bonus3');
        CRUD::column('save')->label('Partie gratuite');

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

        CRUD::setValidation(ScoresRequest::class);

        CRUD::field('game_id')->label('Nom du jeu');
        CRUD::field('user_id')->label('Joueur');
        CRUD::field('score')->type('number')->label('Score');
        CRUD::field('data')->type('number')->label('Bonus1');
        CRUD::field('data2')->type('number')->label('Bonus2');
        CRUD::field('data3')->type('number')->label('Bonus3');
        CRUD::field('save');

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
