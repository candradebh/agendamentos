<?php

namespace Oncoclinicas\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(
           'Oncoclinicas\Repositories\PacienteRepository',
           'Oncoclinicas\Repositories\PacienteRepositoryEloquent'
       );

        $this->app->bind(
            'Oncoclinicas\Repositories\MedicoRepository',
            'Oncoclinicas\Repositories\MedicoRepositoryEloquent'
        );


        $this->app->bind(
            'Oncoclinicas\Repositories\EventRepository',
            'Oncoclinicas\Repositories\EventRepositoryEloquent'
        );


    }
}
