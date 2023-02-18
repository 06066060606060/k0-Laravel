<?php

namespace App\Http\Controllers\Admin\Operations;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

trait ProcessOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupProcessRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/process', [
            'as'        => $routeName.'.process',
            'uses'      => $controller.'@process',
            'operation' => 'process',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupProcessDefaults()
    {
        CRUD::allowAccess('process');

        CRUD::operation('process', function () {
            CRUD::loadDefaultOperationSettingsFromConfig();
        });

        CRUD::operation('list', function () {
            // CRUD::addButton('top', 'process', 'view', 'crud::buttons.process');
            // CRUD::addButton('line', 'process', 'view', 'crud::buttons.process');
            $this->crud->addButton('line', 'process', 'view', 'crud::buttons.process');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function process()
    {
        CRUD::hasAccessOrFail('process');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = CRUD::getTitle() ?? 'Process '.$this->crud->entity_name;
        $this->data['entry'] = $this->crud->getCurrentEntry();
        // load the view
        dd($this->data);
        return view('crud::games', $this->data);
    }
}