<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Calculator;


class CreateCustomFacade extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Math', Calculator::class);
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
