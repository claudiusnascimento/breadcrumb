<?php namespace ClaudiusNascimento\Breadcrumb;

use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views', 'breadcrumb');

		$this->publishes([
	        __DIR__.'/views' => base_path('resources/views/caunascimento/bradcrumb'),
	    ], 'views');

	    $this->publishes([
		    __DIR__.'/config/caubreadcrumb.php' => config_path('caubreadcrumb.php'),
		], 'config');

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
		    __DIR__.'/config/caubreadcrumb.php', 'caubreadcrumb'
		);

		$this->app->singleton('breadcrumb', function($app)
		{
		    return new \ClaudiusNascimento\Breadcrumb\Breadcrumb;
		    
		});

	}

}
