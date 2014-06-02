<?php namespace Fehr\Cart;

use Fehr\Cart\Cart\CartInterface;

class Cart {

	protected $cart;

	public function __construct()
	{

		$this->cart = new CartInterface;

	}

	public function createCart()
	{

		return $this->cart->createCart();

	}

	public function cartItems()
	{

		return $this->cart->getCartContents();

	}

	public function emptyCart()
	{

		return $this->cart->emptyCart();

	}
	
	public function addItemToCart($item)
	{

		return $this->cart->addItem($item);
		
	}

	public function removeItemFromCart($itemId)
	{

		return $this->cart->removeItem($itemId);

	}

}