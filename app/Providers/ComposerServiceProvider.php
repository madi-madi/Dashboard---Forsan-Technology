<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
      //  $view->composer('*', 'App\Http\ViewComposers\GlobalComposer');
                        View::composer(
            'admin.layouts.app-admin', 'App\Http\ViewComposers\InvoiceComposer'
        );
    }

    public function register()
    {
        //
    }

}