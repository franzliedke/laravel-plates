<?php namespace Franzl\LaravelPlates;

use Illuminate\Support\ServiceProvider;

class LaravelPlatesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function boot()
	{
		$app = $this->app;

		$app['view']->addExtension('plates.php', 'plates', function() use ($app)
		{
			$path = $app['config']['view.paths'][0];

			return new Engine($path, 'plates.php');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}