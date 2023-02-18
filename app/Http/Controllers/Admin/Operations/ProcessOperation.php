<?php

namespace App\Http\Controllers\Admin\Operations;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;
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
        fast('FAST DEBUGGER IS WORKING');
        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['game_id'] = CRUD::getCurrentEntry()->id;
       $gamename = CRUD::getCurrentEntry()->name;
      
        $command = $this->crud->getCurrentEntry()->process;
        $process = Process::fromShellCommandline($command );
        $processOutput = '';
        $captureOutput = function ($type, $line) use (&$processOutput) {
            $processOutput .= $line;
        };

        $process->setTimeout(null)->run($captureOutput);

        if ($process->getExitCode()) {
        
         $admin = backpack_user()->where('role', 'admin')->first();
         $admin->notify(
             new DatabaseNotification(
                 ($type = 'error'), // info / success / warning / error
                 ($message = 'Erreur au lancement de ' . $gamename),
                 ($messageLong = 'Erreur au lancement de ' . $gamename . ' : ' . $processOutput)
                    // rand(1, 99999)), // optional
                // ($href = '/some-custom-url'), // optional, e.g. backpack_url('/example')
                // ($hrefText = 'Go to custom URL') // optional
             )
         );
         return $processOutput;
        }

          //create notification
          $admin = backpack_user()->where('role', 'admin')->first();
          $admin->notify(
              new DatabaseNotification(
                  ($type = 'success'), // info / success / warning / error
                  ($message = 'Lancement de ' . $gamename),
                  ($messageLong = 'Lancement de ' . $gamename)
                     // rand(1, 99999)), // optional
                 // ($href = '/some-custom-url'), // optional, e.g. backpack_url('/example')
                 // ($hrefText = 'Go to custom URL') // optional
              )

          );
          //wait 3 seconds before returning
           
         
        // return $processOutput;
        return redirect('/admin');
        sleep(5);
    }
}