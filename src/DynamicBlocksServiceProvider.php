<?php 

namespace ClaudiusNascimento\DynamicBlocks;

use Illuminate\Support\ServiceProvider;

class DynamicBlocksServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		include __DIR__.'/routes.php';

		$this->loadViewsFrom(__DIR__.'/views', 'dynamic-blocks');

		$this->publishes([
	        __DIR__.'/views' => base_path('resources/views/claudiusnascimento/dynamic-blocks'),
	    ], 'views');

		$this->publishes([
		    __DIR__.'/config/dynamic-blocks.php' => config_path('dynamic-blocks.php'),
		], 'config');

		$this->publishes([
		    __DIR__.'/database/migrations/' => database_path('/migrations')
		], 'migrations');

		$this->publishes([
		    __DIR__.'/assets' => public_path('claudiusnascimento/dynamic-blocks'),
		], 'public');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
		    __DIR__.'/config/dynamic-blocks.php', 'dynamic-blocks'
		);

		$this->app->bind('dynamic-blocks', function()
		{
		    return new \ClaudiusNascimento\DynamicBlocks\DynamicBlocks;
		});

		$this->app->make('ClaudiusNascimento\DynamicBlocks\DynamicBlocksController');
	}

}

