<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartItemPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart_item_pivot', function($table)
        {
        	$table->increments('id');
        	$table->integer('cart_id');
        	$table->integer('item_id');
        	$table->integer('quantity');
        	$table->softDeletes();
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
		Schema::drop('cart_item_pivot');
	}

}
