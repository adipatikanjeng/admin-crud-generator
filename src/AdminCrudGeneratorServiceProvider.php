<?php

namespace Adipatikanjeng\AdminCrudGenerator;

use Illuminate\Support\ServiceProvider;

class AdminCrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/admin-crud-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Adipatikanjeng\AdminCrudGenerator\Commands\CrudCommand',
            'Adipatikanjeng\AdminCrudGenerator\Commands\CrudControllerCommand',
            'Adipatikanjeng\AdminCrudGenerator\Commands\CrudModelCommand',
            'Adipatikanjeng\AdminCrudGenerator\Commands\CrudMigrationCommand',
            'Adipatikanjeng\AdminCrudGenerator\Commands\CrudViewCommand'
        );
    }

}
