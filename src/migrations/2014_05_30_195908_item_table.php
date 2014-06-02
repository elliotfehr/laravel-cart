<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item', function($table)
        {
        	$table->increments('id');
        	$table->integer('category_id');
        	$table->integer('price');
        	$table->tinyInteger('is_active');
        	$table->string('item_name');
        	$table->integer('weight');
        	$table->string('item_description');
        	$table->integer('image_id');	
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
		Schema::drop('item')
;	}

}
