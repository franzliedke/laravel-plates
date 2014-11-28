<?php namespace Franzl\LaravelPlates;

use Illuminate\Support\ServiceProvider;
use League\Plates\Engine as PlatesEngine;

class LaravelPlatesServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->singleton('League\Plates\Engine', function () use ($app) {
            $path = $app['config']['view.paths'][0];

            return new PlatesEngine($path, 'plates.php');
        });

        $app->resolving('view', function($view) use ($app) {
            $view->addExtension('plates.php', 'plates', function() use ($app) {
                return new Engine($app->make('League\Plates\Engine'));
            });
        });
    }

}
