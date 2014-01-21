<?php namespace Franzl\LaravelPlates;

use Illuminate\Support\ServiceProvider;

class LaravelPlatesServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;
		
		$app->resolving('view', function($view) use ($app)
		{
			$view->addExtension('plates.php', 'plates', function() use ($app)
			{
				$path = $app['config']['view.paths'][0];
				
				return new Engine($path, 'plates.php');
			})
		});
	}

}
