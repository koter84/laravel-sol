<?php
namespace Koter84\SolAuth;

use Illuminate\Support\ServiceProvider;

class SolAuthServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// register this ServiceProvider with auth...
		// https://laracasts.com/discuss/channels/laravel/replacing-the-laravel-authentication-with-a-custom-authentication
//		$this->app['auth']->extend('sol',function()
//		{
//			return new SolUserProvider();
//		});

		if (! $this->app->routesAreCached()) {
	        require __DIR__.'/Http/routes.php';
	    }
	    require_once __DIR__.'/Classes/LightOpenID.php';

        $this->loadViewsFrom(__DIR__.'/Views', 'sol-auth');

	    $this->publishes([
	        __DIR__.'/Config/sol.php' => config_path('sol.php'),
	        __DIR__.'/Views' => base_path('resources/views/vendor/sol-auth'),
	    ]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
