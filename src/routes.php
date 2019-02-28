<?php 

// get prefix from config
// get middlewares from config
// open route group and add prefix and middlewares


$package_middlewares = config('dynamic-blocks.middlewares', []);
$prefix = config('dynamic-blocks.prefix', '');

Route::group(['middleware' => $package_middlewares, 'prefix' => $prefix], function() {

	Route::post('dynamic-blocks/store', ['as' => 'dynamic-blocks.store','uses' => 'ClaudiusNascimento\DynamicBlocks\DynamicBlocksController@store']);

	Route::post('dynamic-blocks/{id}/edit', ['as' => 'dynamic-blocks.edit','uses' => 'ClaudiusNascimento\DynamicBlocks\DynamicBlocksController@update']);

	Route::post('dynamic-blocks/{id}/delete', ['as' => 'dynamic-blocks.delete','uses' => 'ClaudiusNascimento\DynamicBlocks\DynamicBlocksController@destroy']);

});