<?php namespace Fehr\Cart\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CartItem extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cart_item_pivot';


	/**
	 * The soft deleting column that will be 
	 * used by the model.
	 *
	 * @var string
	 */
	protected $dates = ['deleted_at'];

}
