<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dynamic_blocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key'); // 
			$table->string('rel', 255); // relation to model:
			$table->integer('rel_id')->unsigned(); // relation to model id:
			$table->string('title', 255); // title ? :)
			$table->string('sub_title', 255); // relation to model:
			$table->text('wildcard'); // helper usage:
			$table->text('content'); // content? :)
			$table->boolean('active')->default(true);
			$table->integer('order')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dynamic_blocks');
	}

}
