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
        	$table->string('cart_id');
        	$table->string('item_id');
        	$table->tinyInteger('did_purchase');
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
		Schema::down('cart_item_pivot');
	}

}
